<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;
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

    public function edit($id)
    {
        $product = $this->product->find($id);

        return view('admin.products.edit', compact('product'));
    }

    public function store(ProductRequest $req)
    {
        $this->product->create($req->all());

        return redirect()->route('admin.products.index');
    }

    public function update($id, ProductRequest $req)
    {
        $product = $this->product->find($id)->update($req->all());

        return redirect()->route('admin.products.index');
    }
}
