<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('produtos', 'ProductsController@index');

Route::get('admin/products', ['as' => 'admin.products.index', 'uses' => 'Admin\ProductsController@index']);
Route::get('admin/products/create', ['as' => 'admin.products.create', 'uses' => 'Admin\ProductsController@create']);
Route::post('admin/products/store', ['as' => 'admin.products.store', 'uses' => 'Admin\ProductsController@store']);