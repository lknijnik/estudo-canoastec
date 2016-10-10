<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/products', function () {
    $products = \App\Product::all();

    return response()->json($products);
});

Route::get('/products/{id}', function ($id) {
    $product = \App\Product::with('reviews')->find($id);

    return response()->json($product);
});