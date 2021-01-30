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

Route::get('/', 'UserController@index')->name('main');
Route::get('/login', 'UserController@getlogin')->name('login');
Route::post('/login', 'UserController@postlogin')->name('login');
Route::get('/registration', 'UserController@getregistration')->name('registration');
Route::post('/registration', 'UserController@postregistration')->name('registration');
Route::get('/logout', 'UserController@logout')->name('logout');

Route::post('/adminlogin', 'AdminController@adminlogin')->name('adminlogin');
Route::get('/admin', 'AdminController@admin')->name('admin');
Route::get('/adminlogin', 'AdminController@getadminlogin')->name('adminlogin');
Route::get('/adminlogout', 'AdminController@adminlogout')->name('adminlogout');
Route::get('/admin/{id}', 'AdminController@deleteuser')->name('delete');
Route::post('/admin/update', 'AdminController@updateuser')->name('update');

Route::post('products/upload','ProductController@uploadproducts')->name('upload');
Route::get('/products/{id}', 'ProductController@deleteprod')->name('deleteprod');
Route::post('/products/update','ProductController@updateprod')->name('updateprod');

Route::get('/cart/{id}','CardController@addcart')->name('addcart');
Route::get('/cart','CardController@getcart')->name('cart');
Route::get('/{totalprice}','CardController@getorder')->name('order');
Route::post('/order/{totalprice}','CardController@postorder')->name('postorder');
