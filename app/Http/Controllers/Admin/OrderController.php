<?php

namespace App\Http\Controllers\Admin;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id' , 'desc')->get();
        return view('admin.orders.index' , compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::findOrFail($id);
        $info = json_decode($order->info , true);
        $data = compact(
            'order',
            'info'
        );
        return view('admin.orders.detail' , $data);
    }

    public function update(Request $request,$id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        $request->session()->flash('update');
        return redirect()->back();
    }
}
