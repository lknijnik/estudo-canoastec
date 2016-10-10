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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

/*Route::get('/auth', function() {
   
	if (Auth::attempt(['name' => 'leonel', 'password' => 123]))
	{
		return "Ok";
	}
	
	return "ERROU!!!";
	
});

Route::get('/auth/logout', function() {
	Auth::logout();
});*/

Auth::routes();

Route::get('produtos', 'ProductsController@index');
Route::get('produtos/{parameter}', 'ProductsController@detail');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

	Route::get('', 			['as' => 'admin.index.index', 'uses' => 'Admin\IndexController@index']);
	Route::get('dashboard', ['as' => 'admin.index.index', 'uses' => 'Admin\IndexController@index']);

	Route::group(['prefix' => 'products'], function() {

		Route::get('', 				['as' => 'admin.products.index',	'uses' => 'Admin\ProductsController@index']);
		Route::get('create', 		['as' => 'admin.products.create',	'uses' => 'Admin\ProductsController@create']);
		Route::get('edit/{id}', 	['as' => 'admin.products.edit', 	'uses' => 'Admin\ProductsController@edit']);
		Route::post('store', 		['as' => 'admin.products.store',	'uses' => 'Admin\ProductsController@store']);
		Route::put('update/{id}', 	['as' => 'admin.products.update',	'uses' => 'Admin\ProductsController@update']);
		Route::get('delete/{id}', 	['as' => 'admin.products.delete',	'uses' => 'Admin\ProductsController@delete']);

	});

});

Route::get('/home', 'HomeController@index');
