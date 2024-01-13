<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail, $sslCommerzPayment;
    public function index(){
        $this->customer = '';
        if(Session::get('customer_id')){
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        return view('website.checkout.index',['customer' => $this->customer]);
    }

    public function newOrder(Request $request){

        $this->customer = Customer::where('email',$request->email)->orWhere('mobile',$request->mobile)->first();

        if(!$this->customer){
           $this->customer = Customer::newCustomer($request);
        }


        Session::put('customer_id',$this->customer->id);
        Session::put('customer_name',$this->customer->name);

        if($request->payment_method == 'Online')
        {
            $this->sslCommerzPayment = new SslCommerzPaymentController();
            $this->sslCommerzPayment->index($request,$this->customer);
        }
        elseif($request->payment_method == 'Cash')
        {
            $this->order = Order::newOrder($this->customer,$request);
            $this->orderDetail = OrderDetail::newOrderDetail($this->order);

            return redirect('/complete-order')->with('msg','Congratulation...your order post successfully. Please check your mail and wait we will contact with you soon.');
        }

    }

    public function completeOrder(){
        return view('website.checkout.complete-order');
    }
}
