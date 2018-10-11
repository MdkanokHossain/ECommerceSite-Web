<?php

namespace App\Http\Controllers;

use App\Customer;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use App\Order;
use DB;
use PDF;

class OrderController extends Controller
{
    public function manageOrder() {
//        $orders = Order::all();
        $orders = DB::table('orders')
                    ->join('customers', 'orders.customer_id', '=', 'customers.id')
                    ->join('payments', 'orders.id', '=', 'payments.order_id')
                    ->select('orders.*', 'customers.first_name','customers.last_name', 'payments.payment_method', 'payments.payment_status' )
                    ->get();

//        return $orders;

        return view('admin.order.manage-order', ['orders'=>$orders]);
    }

    public function viewOrderDetail($id) {
        $order      = Order::find($id);
        $customer   = Customer::find($order->customer_id);
        $shipping   = Shipping::find($order->shipping_id);
        $payment    = Payment::where('order_id', $id)->first();
        $products   = OrderDetail::where('order_id', $id)->get();



        return view('admin.order.view-order', [
            'order'     =>  $order,
            'customer'  =>  $customer,
            'shipping'  =>  $shipping,
            'payment'   =>  $payment,
            'products'  =>  $products
        ]);
    }

    public function viewOrderInvoice($id) {
        $order      = Order::find($id);
        $customer   = Customer::find($order->customer_id);
        $shipping   = Shipping::find($order->shipping_id);
        $payment    = Payment::where('order_id', $id)->first();
        $products   = OrderDetail::where('order_id', $id)->get();

        return view('admin.order.view-invoice', [
            'order'     =>  $order,
            'customer'  =>  $customer,
            'shipping'  =>  $shipping,
            'payment'   =>  $payment,
            'products'  =>  $products
        ]);
    }

    public function printOrderInvoice($id) {
        $order      = Order::find($id);
        $customer   = Customer::find($order->customer_id);
        $shipping   = Shipping::find($order->shipping_id);
        $payment    = Payment::where('order_id', $id)->first();
        $products   = OrderDetail::where('order_id', $id)->get();


//        $pdf = PDF::loadHtml('<h1>Hello World</h1>');
        $pdf = PDF::loadView('admin.order.order-invoice',[
            'order'     =>  $order,
            'customer'  =>  $customer,
            'shipping'  =>  $shipping,
            'payment'   =>  $payment,
            'products'  =>  $products
        ]);
        return $pdf->stream('test.pdf');
    }
}
