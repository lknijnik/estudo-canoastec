<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;

class ProductsController extends Controller
{
	private $product;

	public function __construct(Product $product)
	{
		$this->product = $product;
	}

    public function index()
    {
    	$products = $this->product->paginate(5);

    	//dd($products);

    	return view('admin.products.index', compact('products'));
    }

    public function create()
    {
    	return view('admin.products.create');
    }

    public function store(Request $req)
    {
        //dd($req->all());
        $this->product->create($req->all());

        return redirect()->route('admin.products.index');
    }
}
