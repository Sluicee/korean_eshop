<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getProfile() {
        $orders = Order::with('user')->where('user_id', Auth::id())->get();
        return view('profile', ['orders' => $orders]);
    }
}
