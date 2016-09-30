<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';

    protected $fillable = [
    	'title',
    	'short_description',
		'sku',
		'stock',
		'minimum_stock',
		'price',
		'weight',
		'width',
		'length',
		'height',
		'description'
    ];

    protected $guarded = [
    	'status'
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
