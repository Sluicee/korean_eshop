<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class MainController extends Controller
{
    public function home() {
        $data = Product::with('images')->get();
        return view('home', ['data' => $data]);
    }

    public function openCatalog(){
        $data = Product::with('images')->get();
        return view('catalog', ['data' => $data]);
    }

    public function cartList()
    {
        return view('cart');
    }

}
