<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;


class ReviewController extends Controller
{
    public function uploadReview(Request $request, $product_id) {
        $review = new Review;
        $review->user_id = Auth::id();
        $review->product_id = $product_id;
        $review->review = $request->review_text;
        $review->rating = $request->rating;
        $review->author = Auth::user()->name;
        $review->status = 1;
        $review->save();
        $product = new ProductController;
        $product->updateProductRating($product_id);
        return redirect()->back()->with('success', 'Отзыв отправлен!');
    }

}
