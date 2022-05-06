<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function uploadReview(Request $request, $product_id) {
        $review = new Review;
        $product = Product::find($product_id);
        $review->user_id = Auth::id();
        $review->product_id = $product_id;
        $review->review = $request->review_text;
        $review->rating = $request->rating;
        $review->author = Auth::user()->name;
        $review->save();

        $a = array_filter(Review::get()->map->only(['rating'])->toArray());
        if(count($a)) {
            $average = array_sum(array_column($a, 'rating'))/count($a);
        }
        $product->rating = $average;
        $product->save();

        return redirect()->back()->with('success', 'Отзыв отправлен!');
    }
}
