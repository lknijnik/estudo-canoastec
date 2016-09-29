<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function products()
	{
   		return $this->belongsToMany('App\Product', 'products_categories');
	}
}
