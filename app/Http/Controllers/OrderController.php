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
        $order->fio = $request->familiya." ".$request->imya." ".$request->otchestvo;
        $order->total_price = $request->total_price;
        $order->address = $request->address." ".$request->country." ".$request->city;
        $order->zipcode = $request->zipcode;
        $order->phone = $request->phone;
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
