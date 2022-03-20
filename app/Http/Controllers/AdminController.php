<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function openAdmin() {
        return view("admin_panel.admin");
    }

    public function openAdminUploadProduct() {
        return view("admin_panel.upload_product");
    }

    public function productSubmit(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:855',
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->stock = $request->stock ? true : false;
        $product->description = $request->description;
        $product->mass = $request->mass;
        $product->taste = $request->taste;
        $product->code = $request->code;
        $product->expiration_date = $request->expiration_date;
        $product->storage_conditions = $request->storage_conditions;
        $product->energy_value = $request->energy_value;
        $product->composition = $request->composition;
        $product->save();
        $files = $request->file('images');
        foreach ($files as $imagefile) {
            $image = new Image;
            $image->url = substr($imagefile->store('public/image') , 13);
            $image->product_id = $product->id;
            $image->save();
        }
        return redirect()->route('admin.uploadProduct');
    }
    
}
