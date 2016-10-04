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
   		return $this->belongsToMany('App\Category', 'products_categories');

   }

   public function subcategories()
   {
   		return $this->belongsToMany('App\Subcategory', 'products_categories');

   }

   public function attributes()
   {
   		return $this->belongsToMany('App\Attribute', 'products_attributes');

   }
}
