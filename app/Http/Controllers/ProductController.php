<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;

class ProductController extends Controller
{
    public function openProduct($category, $product_id){
        $data = Product::with('images')->where('id',$product_id)->first();
        $reviews = Review::where([['product_id', $product_id], ['status', 1]])->paginate(3);
        $reviews_count = Review::where([['product_id', $product_id], ['status', 1]])->count();
        $sameProducts = Product::with('images', 'category')->get();
        return view('product', ['product' => $data, 'sameProducts' => $sameProducts, 'reviews' => $reviews, 'reviews_count' => $reviews_count]);
    }

    public function updateProductRating($product_id) {
        $product = Product::find($product_id);
        $a = array_filter(Review::where('status', 1)->get()->map->only(['rating'])->toArray());
        if(count($a)) {
            $average = array_sum(array_column($a, 'rating'))/count($a);
        }
        $product->rating = $average;
        $product->save();
    }
}
