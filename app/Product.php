<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';

    protected $fillable = [
        'name',
    	'short_description',
  		'sku',
        'grouping_sku',
        'isbn',
  		'stock',
  		'minimum_stock',
  		'price',
        'discount_price',
        'discount_percentage',
  		'weight',
  		'width',
  		'length',
  		'height',
  		'description',
        'status',
    ];


    public function reviews()
    {
    	return $this->hasMany('App\Review');
    }

    public function brand()
    {
   	    return $this->belongsTo('App\Brand');
    }

    public function categories()
    {
   		return $this->belongsToMany('App\Category', 'products_to_categories');
    }

    public function subcategories()
    {
   		return $this->belongsToMany('App\Subcategory', 'products_to_categories');
    }

    public function attributes()
    {
   		return $this->belongsToMany('App\Attribute', 'products_to_attributes');
    }

    public function storefronts()
    {
        return $this->belongsToMany('App\Storefront', 'products_to_storefronts');
    }

    public function relatedProducts()
    {
        return $this->belongsToMany('App\Product', 'related_products');
    }

    public function images()
    {
        return $this->hasMany('App\PrductImages');
    }
}
