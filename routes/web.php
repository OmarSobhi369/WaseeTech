<?php

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

use App\Order;

Route::redirect('/', 'home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');


Route::get('/products/vendor={vendor_id}', 'ProductController@thisvendor')->name('products.thisvendor');
Route::get('/products/search', 'ProductController@search')->name('products.search');
Route::resource('products', 'ProductController');


Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');
Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{itemId}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/cart/update/{itemId}', 'CartController@update')->name('cart.update')->middleware('auth');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::get('/cart/apply-coupon', 'CartController@applyCoupon')->name('cart.coupon')->middleware('auth');


Route::resource('orders', 'OrderController')->middleware('auth');

Route::resource('shop','ShopController')->middleware('auth');


Route::group(['prefix' => 'admin'], function () {

    Voyager::routes();

    Route::get('/order/pay/{suborder}', 'SubOrderController@pay')->name('order.pay');


});


Route::group(['prefix' => 'seller', 'middleware' => 'auth', 'as' => 'seller.', 'namespace' => 'Seller'], function () {

    Route::redirect('/','seller/orders');

    Route::resource('/orders',  'OrderController');

    Route::get('/orders/delivered/{suborder}',  'OrderController@markDelivered')->name('order.delivered');
});

/* Route::get('/test', function () {
    $order = Order::find()
}); */


