<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;

class ProductsController extends Controller
{
    //

    public function index()
    {

    	$products = Product::all();
    	return view('products.index', compact('products'));

    }

    public function detail($parameter)
    {
        return view('products.detail');
    }
}
