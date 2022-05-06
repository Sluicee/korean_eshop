<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Image;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function openAdmin() {
        return view("admin_panel.admin");
    }

    public function openAdminEditProducts() {
        $data = Product::all();
        return view("admin_panel.edit_products", ['products' => $data]);
    }

    public function openAdminUploadProduct() {
        $data = Category::all();
        return view("admin_panel.upload_product", ['categories' => $data]);
    }

    public function productSubmit(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required',
            'images' => 'required'
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->stock = $request->stock ? true : false;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();
        $files = $request->file('images');

        foreach ($files as $imagefile) {
            $image = new Image;
            $image->url = substr($imagefile->store('public/image') , 13);
            $image->product_id = $product->id;
            $image->save();
        }
        return redirect()->route('admin.uploadProduct')->with('success', 'Продукт добавлен');
    }

    public function removeProduct($id) {
        $product = Product::find($id)->delete();
        $request = new Request;
        $request->id = $id;
        $CartController = new CartController;
        $CartController->removeCart($request);
        return redirect()->route('admin.editProducts')->with('success', 'Продукт удален');
    }

    public function openEditProduct($id) {
        $product = Product::find($id);
        $categories = Category::all();
        return view("admin_panel.edit_product", ['product' => $product, 'categories' => $categories]);
    }

    public function updateProduct($id, Request $request) {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->stock = $request->stock ? true : false;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();
        $files = $request->file('images');
        if($request->replaceImages){
            if ($files) {
                $product->images()->delete();
                foreach ($files as $imagefile) {
                    $image = new Image;
                    $image->url = substr($imagefile->store('public/image') , 13);
                    $image->product_id = $product->id;
                    $image->save();
                }
            }
        }
        else {
            if ($files) {
                foreach ($files as $imagefile) {
                    $image = new Image;
                    $image->url = substr($imagefile->store('public/image') , 13);
                    $image->product_id = $product->id;
                    $image->save();
                }
            }
        }
        return redirect()->route('admin.editProducts')->with('success', 'Продукт изменён');
    }
    
    public function openAdminEditCategories() {
        $data = Category::with('products')->get();
        return view("admin_panel.edit_categories", ['data' => $data]);
    }

    public function categorySubmit(Request $request) {

        if(Category::where('name', $request->name)->exists()) {
            return redirect()->to(route('admin.editCategories'))->withErrors([
                'categorySubmitError' => 'Категория уже существует'
            ]);
        }

        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.editCategories')->with('success', 'Категория добавлена');
    }
    
    public function categoryDelete($id) {
        $category = Category::find($id)->delete();
        return redirect()->route('admin.editCategories')->with('success', 'Категория удалена');
    }

    public function categoryUpdate(Request $request) {
        $category = Category::pluck("name", "id");
        $counter = 0;
        foreach($request->new_cat_name as $edit){
            if (array_slice($category->toArray(), $counter, 1)[0] != $edit){
                $editedCategory = Category::find(array_search(array_slice($category->toArray(), $counter, 1)[0], $category->toArray()));
                $editedCategory->name = $edit;
                $editedCategory->save();
            }
            $counter++;
        }
        return redirect()->route('admin.editCategories');
    }

    public function getOrders() {
        $orders = Order::all(); 
        return view('admin_panel.orders', ['orders' => $orders]);
    }
}
