<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class WishlistController extends Controller
{
    public function addToWishlist($id, Request $request)
    {
        $product = Product::with('images')->find($id);
        if(!$product) {
            abort(404);
        }
        $wishlist = session()->get('wishlist');
        // if wishlist is empty then this the first product
        if(!$wishlist) {
            $wishlist = [
                    $id => [
                        "product_id" => $product->id,
                        "name" => $product->name,
                        "category" => Category::find($product->category),
                        "price" => $product->price,
                        "sale" => $product->sale,
                        "created_at" => $product->created_at,
                        "image" => $product->images[0]->url
                    ]
            ];
            session()->put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Добавлено в желаемое!');
        }
        // if item not exist in wishlist then add to wishlist with quantity
        $wishlist[$id] = [
            "product_id" => $product->id,
            "name" => $product->name,
            "category" => Category::find($product->category),
            "price" => $product->price,
            "sale" => $product->sale,
            "created_at" => $product->created_at,
            "image" => $product->images[0]->url
        ];
        session()->put('wishlist', $wishlist);
        return redirect()->back()->with('success', 'Добавлено в желаемое!');
    }

    public function removeWishlist(Request $request)
    {
        if($request->id) {
            $wishlist = session()->get('wishlist');
            if(isset($wishlist[$request->id])) {
                unset($wishlist[$request->id]);
                session()->put('wishlist', $wishlist);
            }
            session()->flash('success', 'Удалено из желаемого');
        }
    }
}
