<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\Customer;
use Mail;
use App\Order;
use App\Payment;
use App\OrderDetail;
use App\Shipping;
use Cart;
use Session;

class CheckOutController extends Controller
{
   public function index(){
       return view('front-end.checkout.checkout-content');
   }
   public function customerLoginCheck(Request $request){
       $customerEmailaaaHas=Customer::where('email', $request->email)->first();

       if ($customerEmailaaaHas){
           $customer=Customer::where('email', $request->email)->first();

           if (password_verify($request->password, $customer->password)) {

               Session::put('customerId', $customer->id);
               Session::put('customerName', $customer->first_name.' '.$customer->last_name);
               return redirect('checkout/shipping');

           } else {
               return redirect('checkout')->with('message', 'Please input your valid password');
           }

       } else{
           return redirect('checkout')->with('message', 'Please input your valid Email');
       }



   }

   public function customerSave(Request $request){

       $this->validate($request, [
           'email' => 'unique:customers,email'
       ]);
       $customer=new Customer;
       $customer->first_name = $request->first_name;
       $customer->last_name = $request->last_name;
       $customer->email = $request->email;
       $customer->password = bcrypt($request->password);
       $customer->mobile = $request->mobile;
       $customer->address = $request->address;

       $data=$customer->toArray();

       Mail::send('front-end.mail.mail-content', $data, function($message) use ($data) {
           $message->to($data['email']);
           $message->subject('Confirmation mail');
       });
       $customer->save();

       $customerId=$customer->id;
       Session::put('customerId', $customerId);
       Session::put('customerName', $customer->first_name.' '.$customer->last_name);
       return redirect('checkout/shipping');



   }
   public function checkoutShipping(){
       $customerId=Customer::find(Session::get('customerId'));
       return view('front-end.checkout.shipping', ['customer'=>$customerId]);
   }
   public function shippingSave(Request $request){
       $shipping=new Shipping;
       $shipping->full_name = $request->full_name;
       $shipping->email = $request->email;
       $shipping->mobile = $request->mobile;
       $shipping->address = $request->address;
       $shipping->save();

       $shippingId=$shipping->id;
       Session::put('shippingId', $shippingId);
       return redirect('checkout/payment');


   }

   public function checkoutPayment(){
       return view('front-end.checkout.payment');
   }
   public  function newOrder(Request $request){

       $paymentType=$request->payment_method;
       if ($paymentType == 'cash'){
           $orders= new Order;
           $orders->customer_id = Session::get('customerId');
           $orders->shipping_id = Session::get('shippingId');
           $orders->oreder_total = Session::get('orderTotal');
           $orders->save();

           $payments= new Payment;
           $payments->order_id = $orders->id;
           $payments->payment_type = $paymentType;
           $payments->save();

           $cartProducts=Cart::content();


           foreach ($cartProducts as $cartProduct) {
               $orderDetail = new OrderDetail;
               $orderDetail->order_id = $orders->id;
               $orderDetail->product_id = $cartProduct->id;
               $orderDetail->product_name = $cartProduct->name;
               $orderDetail->product_price = $cartProduct->price;
               $orderDetail->product_quantity = $cartProduct->qty;
               $orderDetail->save();
           }



            Cart::destroy();
           Session::forget('orderTotal');
           Session::forget('product_number');



           return redirect('complete/order');












       }
       else if ($paymentType == 'paypal'){

       }
       else if ($paymentType == 'bkash'){

       }



   }
   public function completeOrder(){
       return redirect('/')->with('message', 'thanks for your valuable order');
   }



}
