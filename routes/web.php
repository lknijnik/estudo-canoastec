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

Route::group(['prefix' => 'admin'], function() {

	Route::group(['prefix' => 'products'], function() {

		Route::get('', 				['as' => 'admin.products.index', 'uses' => 'Admin\ProductsController@index']);
		Route::get('create', 		['as' => 'admin.products.create', 'uses' => 'Admin\ProductsController@create']);
		Route::get('edit/{id}', 	['as' => 'admin.products.edit', 'uses' => 'Admin\ProductsController@edit']);
		Route::post('store', 		['as' => 'admin.products.store', 'uses' => 'Admin\ProductsController@store']);
		Route::put('update/{id}', 	['as' => 'admin.products.update', 'uses' => 'Admin\ProductsController@update']);
		Route::get('delete/{id}', 	['as' => 'admin.products.delete', 'uses' => 'Admin\ProductsController@delete']);

	});

});