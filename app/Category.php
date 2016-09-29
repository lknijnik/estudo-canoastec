<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function subcategories()
    {
    	return $this->hasMany('App\Subcategory');
    }

    public function products()
	{
   		return $this->belongsToMany('App\Product', 'products_categories');
	}
}
