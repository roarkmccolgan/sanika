<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specs extends Model
{
	protected $fillable = ['spec','value','product_id'];

	public $timestamps = false;

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
