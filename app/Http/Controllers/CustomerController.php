<?php

namespace App\Http\Controllers;
use Session;
use App\Customer;
use Mail;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function customerLogout(){
      Session::forget('customerId');
      Session::forget('customerName');
      return redirect('/');
  }
  public function customerLogin(){
      return view('front-end.customer.customer-login');
  }
 public function newCustomerLoginCheck(Request $request)
 {
     $customerEmailaaaHas = Customer::where('email', $request->email)->first();

     if ($customerEmailaaaHas) {
         $customer = Customer::where('email', $request->email)->first();

         if (password_verify($request->password, $customer->password)) {

             Session::put('customerId', $customer->id);
             Session::put('customerName', $customer->first_name . ' ' . $customer->last_name);
             return redirect('login/customer');

         } else {
             return redirect('customer/login')->with('message', 'Please input your valid password');
         }

     } else {
         return redirect('customer/login')->with('message', 'Please input your valid Email');
     }

 }

 public function loginCustomer(){
      return view('front-end.customer.login-customer');
 }
 public function registerCustomer(){
      return view('front-end.customer.register-customer');
 }
 public function registrationCustomer(Request $request){

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
     return redirect('register/new-register-congrats');

 }
 public function registrationCustomerSuccessful(){
      return view('front-end.customer.new-register-congrats');
 }
}
