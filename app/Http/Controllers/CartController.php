<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CartController extends Controller
{
    public function addToCart($id, Request $request)
    {
        $product = Product::with('images')->find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart and $request->qty_to_cart > 0) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => $request->qty_to_cart,
                        "price" => $product->price,
                        "sale" => $product->sale,
                        "image" => $product->images[0]->url
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        elseif ($request->qty_to_cart <= 0 and $request->qty_to_cart != null) {
            dd($cart);
            return  redirect()->back();
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity
        if ($request->qty_to_cart == null) {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "sale" => $product->sale,
                "image" => $product->images[0]->url
            ];
        }
        else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $request->qty_to_cart,
                "price" => $product->price,
                "sale" => $product->sale,
                "image" => $product->images[0]->url
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        
    }

    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function clearAllCart()
    {

    }
}
