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

    public function openProduct($category, $product_id){
        $data = Product::with('images')->where('id',$product_id)->first();
        $sameProducts = Category::with('images')->where('name', $category)->get();
        return view('product', ['product' => $data, 'sameProducts' => $sameProducts]);
    }
}
