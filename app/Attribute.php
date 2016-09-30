<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';

    public function attributeType()
    {
    	return $this->belongsTo('App\AttributeType');
    }

    public function products()
	{
   		return $this->belongsToMany('App\Product', 'products_attributes');
	}
}
