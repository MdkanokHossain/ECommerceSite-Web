<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use Session;
use Cart;
use Mail;

class CheckoutController extends Controller
{
    public function index() {
        return view('front-end.checkout.checkout');
    }

    public function newCustomer(Request $request) {
        $customer = new Customer();
        $customer = $customer->saveCustomerInfo($customer, $request);

        Session::put('customerId', $customer->id);
        Session::put('customerName', $customer->first_name.' '.$customer->last_name);

        $data = $customer->toArray();
        Mail::send('confirmation-mail', $data, function ($message) use ($data) {
            $message->to($data['email_address']);
            $message->subject('Welcome Message');
        });

        return redirect('/show-shipping');
    }

    public function shippingInfo() {
        return view('front-end.checkout.shipping-info');
    }


    public function newShippingInfo(Request $request) {
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);
        return redirect('/payment-info');
    }

    public function paymentInfo() {
        return view('front-end.checkout.payment-info');
    }


    protected function saveOrderInfo($request) {
        $order = new Order();
        $order->customer_id = Session::get('customerId');
        $order->shipping_id = Session::get('shippingId');
        $order->order_total = Session::get('grand_total');
        $order->save();

        $cartProducts = Cart::content();
        foreach ($cartProducts as $cartProduct) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id          = $order->id;
            $orderDetail->product_id        = $cartProduct->id;
            $orderDetail->product_name      = $cartProduct->name;
            $orderDetail->product_price     = $cartProduct->price;
            $orderDetail->product_quantity  = $cartProduct->qty;
            $orderDetail->save();
        }

        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->payment_method = $request->payment_type;
        $payment->save();

        Cart::destroy();
    }

    public function newOrderInfo(Request $request) {
        $paymentType = $request->payment_type;
        if ($paymentType == 'cash_on_delivery') {
            $this->saveOrderInfo($request);
            return redirect('/confirm-order');

        } else if ($paymentType == 'bkash') {
            $this->saveOrderInfo($request);
            return redirect('/confirm-order');

        } else if($paymentType == 'paypal') {
            $this->saveOrderInfo($request);
            return redirect('/confirm-order');

        } else if($paymentType == 'roket') {
            $this->saveOrderInfo($request);
            return redirect('/confirm-order');
        }
    }

    public function confirmOrderInfo() {
        return view('front-end.checkout.confirm-order');
    }

    public function customerLogout() {
        Session::forget('customerId');
        Session::forget('customerName');
        Session::forget('shippingId');

        return redirect('/');
    }

    public function customerLogin(Request $request) {
        $customer = Customer::where('email_address', $request->email_address)->first();
        if ($customer) {
            if (password_verify($request->password, $customer->password)) {
                Session::put('customerId', $customer->id);
                Session::put('customerName', $customer->first_name.' '.$customer->last_name);

                return redirect('/show-shipping');
            } else {
                return redirect('/checkout')->with('message', 'Your password is invalid. Please use valid password');
            }
        } else {
            return redirect('/checkout')->with('message', 'Your email address is invalid. Please use valid email address');
        }
    }

//    public function customerEmailCheck($email) {
//       $customer = Customer::where('email_address', $email)->first();
//       if ($customer) {
//           echo 'Email Address already exists';
//       } else {
//           echo 'Email address available';
//       }
//    }

    public function customerEmailCheck($email) {
        $customer = Customer::where('email_address', $email)->first();
        if ($customer) {
            return json_encode('Email Address already exists') ;
        } else {
            return json_encode('Email address available') ;
        }
    }
}
