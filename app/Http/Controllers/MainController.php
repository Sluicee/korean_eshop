<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Filters\ProductFilters;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home() {
        $data = Product::with('images')->get();
        return view('home', ['data' => $data]);
    }

    public function openCatalog(ProductFilters $filters){
        $data = Product::with('images')->filter($filters)->get();
        $categories = Category::withCount('products')->get();
        return view('catalog', ['data' => $data, 'categories' => $categories]);
    }

    public function cartList()
    {
        return view('cart');
    }

    public function wishlistList()
    {
        return view('wishlist');
    }

    

}
