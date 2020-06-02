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

Route::get('/', function () {
    return view('master');
});


Route::prefix('shopping')->group(function () {
    Route::get('/', 'ProductController@index')->name('products.list');
    Route::get('/add/{id}', 'ProductController@getAddToCart')->name('product.addToCart');
    Route::get('/cart', 'ProductController@showCart')->name('shopping.cart');
    Route::get('/{id}/remove', 'ProductController@removeFromCart')->name('shopping.remove');
});