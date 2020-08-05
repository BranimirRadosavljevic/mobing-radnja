<?php

use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;


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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::get('/', 'ProductController@index')->name('home');
// Route::get('/shop','ShopController@index')->name('shop.index');
Route::get('/shop/{product}','ShopController@show')->name('shop.show');
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('cart.store');
Route::patch('/cart/{product}','CartController@update')->name('cart.update');
Route::delete('/destroy/{product}','CartController@destroy')->name('cart.destroy');

Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')
    ->name('saveForLater.switchToCart');

Route::get('/checkout','CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('/guestCheckout','CheckoutController@index')->name('guestCheckout.index');
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

Route::get('empty',function(){
    Cart::destroy();
});


Route::get('/search', 'ShopController@search')->name('search');

// Route::middleware('auth')->group(function(){
//     Route::get('/my-profile', 'UsersController@edit')->name('users.edit')->middleware('auth');
// });

Route::get('/my-profile', 'UsersController@edit')->name('users.edit')->middleware('auth');
Route::patch('/my-profile', 'UsersController@update')->name('users.update')->middleware('auth');
Route::get('/my-orders', 'OrdersController@index')->name('orders.index')->middleware('auth');
Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show')->middleware('auth');


//footer 
Route::view('/porucivanje','porucivanje')->name('porucivanje');
Route::view('/placanje','placanje')->name('placanje');
Route::view('/isporuka','isporuka')->name('isporuka');
Route::view('/reklamacije','reklamacije')->name('reklamacije');
Route::view('/otkazivanje','otkazivanje')->name('otkazivanje');
Route::view('/privatnost','privatnost')->name('privatnost');
Route::view('/about','about')->name('about');

//Livewire
 Route::livewire('/size', 'size')
    ->layout('layouts.master');
  
Route::livewire('/shop', 'shop-livewire')->name('shop.index')
    ->layout('layouts.master');
