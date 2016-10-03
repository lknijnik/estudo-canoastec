<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
    	'name',
    	'nickname',
		'cpf',
		'rg',
		'birth_date',
		'phone',
		'mobile'
    ];

    public function addresses()
    {
    	return $this->hasMany('App\CustomerAddress');
    }

    public function reviews()
	{
		return $this->hasMany('App\Reviews');
	}
}
