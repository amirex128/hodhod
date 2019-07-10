<?php

namespace App\Http\Controllers;

use App\model\Order;
use Illuminate\Http\Request;
use SoapClient;

class OrderController extends Controller
{



    public function index()
    {
        if (request("paid")=="1"){
            return view('Orders.index', ['orders' => \App\model\Order::latest()->paginate(15)]);
        }elseif(request("paid")=="2"){
            return view('Orders.index', ['orders' => \App\model\Order::where("payment_status","<>",3)->latest()->paginate(15)]);
        }elseif(request("paid")=="3"){
            return view('Orders.index', ['orders' => \App\model\Order::where("payment_status",3)->latest()->paginate(15)]);
        }else{
            return view('Orders.index', ['orders' => \App\model\Order::where("payment_status",3)->latest()->paginate(15)]);
        }
    }


    public function edit(Order $order)
    {
        return view('Orders.edit',['order'=>$order]);
    }


    public function update(Request $request, Order $order)
    {
        $order->status=$request->status;
        $order->admin_description=$request->admin_description;
        $order->save();

        return redirect()->route('order.index')->with('status','سفارش مورد نظر با موفقیت ویرایش شد');
    }


}
