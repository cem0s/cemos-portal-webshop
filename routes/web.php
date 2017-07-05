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
Route::resource('user', 'UserController');
Route::get('/activate/{code}', 'UserController@activate')->name('activate');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/property-overview', 'PropertyController@index')->name('property-overview');
	Route::get('/property-details/{object_id}', 'PropertyController@propertyDetails')->name('property-details');
	Route::get('/add-property', 'PropertyController@addProperty')->name('add-property');
	Route::get('/product-status', 'ProductStatusController@index')->name('product-status');
	Route::get('/shop', 'ShopController@index')->name('shop');
	Route::get('/shop-cart', 'ShopController@shopCart')->name('shop-cart');
	Route::get('/profile', 'ProfileController@index')->name('profile-page');
	Route::get('/calendar', 'CalendarController@index')->name('shop-cart');

	Route::post('/update-pic', 'ProfileController@updatePic')->name('update-pic');
	Route::post('/add-property', 'PropertyController@postAddProperty')->name('add-property');

});
