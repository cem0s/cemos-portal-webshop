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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/property-overview', 'PropertyController@index')->name('property-overview');
Route::get('/property-details', 'PropertyController@propertyDetails')->name('property-details');

Route::get('/product-status', 'ProductStatusController@index')->name('product-status');

Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/shop-cart', 'ShopController@shopCart')->name('shop-cart');

Route::get('/profile', 'ProfileController@index')->name('shop-cart');

Route::get('/calendar', 'CalendarController@index')->name('shop-cart');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
