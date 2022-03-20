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
    Route::get('/admin/catalog', 'App\Http\Controllers\AdminController@openAdminUploadProduct')->name('editCatalog');
    Route::post('/admin/catalog/productSubmit', 'App\Http\Controllers\AdminController@productSubmit')->name('productSubmit');
});


