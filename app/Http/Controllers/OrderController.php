<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function openCheckOut()
    {
        return view('checkout');
    }

    public function checkOut(Request $request)
    {
        if (!$request->session()->has('cart')) {
            return redirect()->route('cart.list')->with('success', 'Корзина пуста');
        }
    
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->familiya = $request->familiya;
        $order->total_price = $request->total_price;
        $order->imya = $request->imya;
        $order->otchestvo = $request->otchestvo;
        $order->address = $request->address;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->zipcode = $request->zipcode;
        $order->phone = $request->tel;
        $order->notes = $request->notes;

        $oldCart = $request->session()->get('cart');
        $order->cart = serialize($oldCart);

        $request->session()->forget('cart');

        $order->save();

        return redirect()->route('home')->with('success', 'Заказ отправлен');
    }

    public function getOrder($id){
        $order = Order::find($id);
        if ($order->user_id != Auth::id()) {
            return redirect()->back();
        }
        $cart = unserialize($order->cart);
        return view('order', ['order' => $order, 'cart' => $cart]);
    }
}
