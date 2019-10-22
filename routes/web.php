<?php
use App\Product;
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
Route::get('/', 'FrontendController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/product', 'ProductController');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('edit');
Route::post('/product/update/{id}', 'ProductController@update')->name('update');
Route::get('/product/delete/{id}', 'ProductController@destroy')->name('destroy');
Route::get('/product/singe/{id}', 'ProductController@show')->name('product.single');
Route::post('/product/add-to-cart', 'ShoppingController@addToCart')->name('cart.add');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::get('/cart/delete/{id}', 'ShoppingController@deleteItem')->name('item.delete');
Route::get('/cart/reduce/{id}/{qty}', 'ShoppingController@reduceItem')->name('item.reduce');
Route::get('/cart/increase/{id}/{qty}', 'ShoppingController@increaseItem')->name('item.increase');
Route::view('/cart/checkout', 'checkout')->name('cart.checkout');
Route::post('/cart/checkout', 'ShoppingController@pay')->name('cart.pay');
