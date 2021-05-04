<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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


Route::view('/', 'welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('product', 'ProductController');

// Route::resource('cart', 'CartController')->withoutMiddleware('CartNotEmpty');

Route::resource('cart', 'CartController')->middleware('auth');

Route::middleware(['auth','CartNotEmpty'])->group(function () {

    Route::resource('checkOut', 'CheckController');

    Route::post('/billing', 'BillingController@placeOrder');

});

