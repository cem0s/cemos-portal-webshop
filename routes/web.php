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
Route::get('/company', 'CompanyController@index')->name('company');
Auth::routes();

Route::group(['middleware' => ['auth','web']], function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/property-overview', 'PropertyController@index')->name('property-overview');
	Route::get('/property-details/{object_id}', 'PropertyController@propertyDetails')->name('property-details');
	Route::get('/add-property', 'PropertyController@addProperty')->name('add-property');
	Route::get('/edit-property/{object_id}', 'PropertyController@editProperty')->name('edit-property');
	Route::get('/product-status', 'ProductStatusController@index')->name('product-status');
	Route::get('/products-form', 'ShopController@productsForm')->name('products-form');
	Route::get('/shop/{object_id}', 'ShopController@index')->name('shop');
	Route::get('/shop-photography', 'ShopController@photography')->name('shop-photography');
	Route::get('/shop-cart', 'ShopController@shopCart')->name('shop-cart');
	Route::get('/show-cart', 'ShopController@showCart')->name('show-cart');	
	Route::get('/new-cart-total', 'ShopController@getNewCartTotal')->name('new-cart-total');
	Route::get('/profile', 'ProfileController@index')->name('profile-page');
	Route::get('/calendar', 'CalendarController@index')->name('shop-cart');
	Route::get('/order', 'OrderController@order')->name('order');
	Route::get('/order-status/{object_id}', 'OrderController@orderStatus')->name('order-status');
	Route::get('/delete-order-product', 'OrderController@deleteOrderProduct')->name('delete-order-product');
	Route::get('/approve-product/{id}', 'OrderController@approveProduct')->name('approve-product');

	Route::post('/update-pic', 'ProfileController@updatePic')->name('update-pic');
	Route::post('/add-property', 'PropertyController@postAddProperty')->name('add-property');
	Route::post('/edit-property/{object_id}', 'PropertyController@postEditProperty')->name('edit-property');
	Route::post('/remove-item', 'ShopController@removeItem')->name('remove-item');
	Route::post('/upload', 'ShopController@uploadFloors')->name('upload-floors');

	Route::delete('/upload', 'ShopController@deleteFloorImage')->name('delete-floor');

	Route::get('/get-images', 'FileController@getImages')->name('get-images');
	Route::get('/view-360/{path}', 'FileController@view360')->name('view-360');
	Route::get('/zip-file','FileController@zipFile')->name('zip-file');

	Route::get('/error-page','ErrorController@errorPage')->name('error-page');

});
