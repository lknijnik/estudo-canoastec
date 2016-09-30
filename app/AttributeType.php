<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeType extends Model
{
	protected $table = 'attribute_types';

    public function attributes()
    {
    	return $this->belongsTo('App\Attribute');
    }

}
