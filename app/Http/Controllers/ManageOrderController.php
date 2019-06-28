<?php

namespace App\Http\Controllers;
use App\Customer;
use DB;
use PDF;
use App\Order;
use App\Shipping;
use App\OrderDetail;
use App\Payment;
use Illuminate\Http\Request;

class ManageOrderController extends Controller
{

    public function manageOrder(){
        $orders=DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('payments', 'orders.id', '=', 'payments.id')
            ->select('orders.*', 'customers.first_name', 'customers.last_name', 'payments.payment_type', 'payments.payment_status')
            ->get();

        return view('dashboard.dashboard_elements.manage-order.order-manage', [
            'orders'=>$orders
        ]);
    }

    public function orderDetail($id){
       $order= Order::find($id);
       $customer=Customer::find($order->customer_id);
       $orderDetails=OrderDetail::where('order_id', $order->id)->get();
       $shipping=Shipping::find($order->shipping_id);
       $payment=Payment::where('order_id', $order->id)->first();

        return view('dashboard.dashboard_elements.manage-order.order-detail', [
            'order'=>$order,
            'customer'=>$customer,
            'orderDetails'=>$orderDetails,
            'shipping'=>$shipping,
            'payment'=>$payment,
        ]);

    }

    public function orderInvoice($id){
        $order= Order::find($id);
        $customer=Customer::find($order->customer_id);
        $orderDetails=OrderDetail::where('order_id', $order->id)->get();
        $shipping=Shipping::find($order->shipping_id);
        $payment=Payment::where('order_id', $order->id)->first();


        return view('dashboard.dashboard_elements.manage-order.order-invoice', [
            'order'=>$order,
            'customer'=>$customer,
            'orderDetails'=>$orderDetails,
            'shipping'=>$shipping,
            'payment'=>$payment,
        ]);
    }

    public function InvoiceDownload($id){
        $order= Order::find($id);
        $customer=Customer::find($order->customer_id);
        $orderDetails=OrderDetail::where('order_id', $order->id)->get();
        $shipping=Shipping::find($order->shipping_id);
        $payment=Payment::where('order_id', $order->id)->first();

        $pdf = PDF::loadView('dashboard.dashboard_elements.manage-order.download-invoice-pdf', [
            'order'=>$order,
            'customer'=>$customer,
            'orderDetails'=>$orderDetails,
            'shipping'=>$shipping,
            'payment'=>$payment,
        ]);
        return $pdf->stream('invoice.pdf');
    }
    public function orderDelete(Request $request){

       return $request->_method;
    }


}
