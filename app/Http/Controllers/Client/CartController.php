<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\CheckoutRequest;
use App\Model\Order;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Mail;

class CartController extends Controller
{

    public function index()
    {
        $carts = \session('cart');
        $data = compact(
            'carts'
        );
        return view('client.cart.index' , $data);
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $info = array('id' => $product->id, 'name' => $product->name, 'quantity' => $request->quantity, 'price' => $request->price);
        if (!session('cart')) {
            $cart = [];
            $cart[$id] = $info;
            $request->session()->put('cart', $cart);
            $request->session()->flash('add_to_cart');
            return redirect()->back();
        } else {
            $cart = Session::get('cart');
            if (array_key_exists($id, $cart) == true) {
                foreach ($cart as $key => $item) {
                    if ($key == $id) {
                        $item['quantity'] += $request->quantity;
                        $cart[$id] = $item;
                        $request->session()->forget('cart');
                        $request->session()->put('cart' , $cart);
                        $request->session()->flash('add_to_cart');
                    }
                };
                return redirect()->back();
            } else {
                $cart[$id] = $info;
                $request->session()->forget('cart');
                $request->session()->put('cart' , $cart);
                $request->session()->flash('add_to_cart');
                return redirect()->back();
            }

        }
    }

    public function update(Request $request , $id){
        $cart = Session::get('cart');
        $cart[$id]['quantity'] = $request->quantity;
        $request->session()->forget('cart');
        $request->session()->put('cart' , $cart);
        $request->session()->flash('update_cart');
        return redirect()->back();
    }

    public function delete(Request $request, $id){
        $cart = Session::get('cart');
        unset($cart[$id]);
        $request->session()->forget('cart');
        $request->session()->put('cart' , $cart);
        return redirect()->back();

    }

    public function checkout()
    {

        $carts = \session('cart');
        $data = compact(
            'carts'
        );
        return view('client.cart.checkout' , $data);
    }

    public function submit(CheckoutRequest $request)
    {
        $data = $request->all();
        Order::create($data);

        Mail::send('mail', array('data'=>$data['info'], 'name'=>$request->receiver_name , 'email'=>$request->receiver_email , 'phone' => $request->receiver_phone , 'address'=>$request->receiver_address , 'note' => $request->note), function($message){
            $message->to('manhhoang3151996@gmail.com', 'Admin')->subject('Hóa đơn đặt hàng');
        });
        $request->session()->forget('cart');
        $request->session()->flash('checkout');
        return redirect(route('client.index'));

    }

}
