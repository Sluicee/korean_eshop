<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function home() {
        return view('home');
    }

    public function openCatalog(){
        $data = Product::with('images')->get();
        return view('catalog', ['data' => $data]);
    }
}
