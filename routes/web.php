<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\MainController@home')->name('home');
Route::get('/catalog', 'App\Http\Controllers\MainController@openCatalog')->name('catalog');
Route::get('/catalog/{category}/product{id}', 'App\Http\Controllers\ProductController@openProduct')->name('open-product');

Route::get('/checkout', 'App\Http\Controllers\MainController@openCheckOut')->name('checkout');

Route::name('cart.')->group(function () {
    Route::get('/cart', 'App\Http\Controllers\MainController@cartList')->name('list');
    Route::post('/cart/store/{id}', 'App\Http\Controllers\CartController@addToCart')->name('store');
    Route::patch('/cart/update', 'App\Http\Controllers\CartController@updateCart')->name('update');
    Route::delete('/cart/remove', 'App\Http\Controllers\CartController@removeCart')->name('remove');
    Route::post('/cart/clear', 'App\Http\Controllers\CartController@clearAllCart')->name('clear');
});

Route::name('wishlist.')->group(function () {
    Route::get('/wishlist', 'App\Http\Controllers\MainController@wishlistList')->name('list');
    Route::get('/wishlist/store/{id}', 'App\Http\Controllers\WishlistController@addToWishlist')->name('store');
    Route::delete('/wishlist/remove', 'App\Http\Controllers\WishlistController@removeWishlist')->name('remove');
});

// Admin Panel

Route::name('admin.')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\AdminController@openAdmin')->name('panel')->middleware('auth')->middleware('role:ADMIN');

    Route::get('/admin/catalog', 'App\Http\Controllers\AdminController@openAdminEditProducts')->name('editProducts')->middleware('auth')->middleware('role:ADMIN');
    Route::get('/admin/catalog/product{id}/remove', 'App\Http\Controllers\AdminController@removeProduct')->name('removeProduct')->middleware('auth')->middleware('role:ADMIN');
    Route::get('/admin/catalog/product{id}/edit', 'App\Http\Controllers\AdminController@openEditProduct')->name('editProduct')->middleware('auth')->middleware('role:ADMIN');
    Route::post('/admin/catalog/product{id}/edit/submit', 'App\Http\Controllers\AdminController@updateProduct')->name('editProductSubmit')->middleware('auth')->middleware('role:ADMIN');

    Route::get('/admin/catalog/new', 'App\Http\Controllers\AdminController@openAdminUploadProduct')->name('uploadProduct')->middleware('auth')->middleware('role:ADMIN');
    Route::post('/admin/catalog/new/productSubmit', 'App\Http\Controllers\AdminController@productSubmit')->name('productSubmit')->middleware('auth')->middleware('role:ADMIN');

    Route::get('/admin/categories', 'App\Http\Controllers\AdminController@openAdminEditCategories')->name('editCategories')->middleware('auth')->middleware('role:ADMIN');
    Route::post('/admin/categories/categorySubmit', 'App\Http\Controllers\AdminController@categorySubmit')->name('categorySubmit')->middleware('auth')->middleware('role:ADMIN');
    Route::get('/admin/categories/{id}/categoryDelete', 'App\Http\Controllers\AdminController@categoryDelete')->name('categoryDelete')->middleware('auth')->middleware('role:ADMIN');
    Route::get('/admin/categories//categoryUpdate', 'App\Http\Controllers\AdminController@categoryUpdate')->name('categoryUpdate')->middleware('auth')->middleware('role:ADMIN');
});

Route::name('user.')->group(function()
{   

    Route::post('/register', 'App\Http\Controllers\RegisterController@register')->name('register');

    Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login');

    Route::get('/logout', function(){
        Auth::logout();
        return redirect(route('home'));
    })->name('logout');

});
