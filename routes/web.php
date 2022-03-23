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

// Admin Panel

Route::name('admin.')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\AdminController@openAdmin')->name('panel');

    Route::get('/admin/catalog', 'App\Http\Controllers\AdminController@openAdminEditProducts')->name('editProducts');
    Route::get('/admin/catalog/new', 'App\Http\Controllers\AdminController@openAdminUploadProduct')->name('uploadProduct');
    Route::post('/admin/catalog/new/productSubmit', 'App\Http\Controllers\AdminController@productSubmit')->name('productSubmit');

    Route::get('/admin/categories', 'App\Http\Controllers\AdminController@openAdminEditCategories')->name('editCategories');
    Route::post('/admin/categories/categorySubmit', 'App\Http\Controllers\AdminController@categorySubmit')->name('categorySubmit');
    Route::get('/admin/categories/{id}/categoryDelete', 'App\Http\Controllers\AdminController@categoryDelete')->name('categoryDelete');
    Route::get('/admin/categories//categoryUpdate', 'App\Http\Controllers\AdminController@categoryUpdate')->name('categoryUpdate');
});


