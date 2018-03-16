<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function getPathAttribute($value)
    {
        return collect($this->categories()->get())->implode('alias','/');
    }

	protected $fillable = [
		'sku',
		'name',
		'alias',
		'strapline',
		'description',
		'price',
		'price_install',
		'seo_title',
		'seo_keywords',
		'seo_description'
	];

    public function orders(){
    	return $this->hasMany('App\Order');
    }

    public function categories(){
    	return $this->belongsToMany('App\Category');
    }

    public function promotions(){
    	return $this->belongsToMany('App\Promotions');
    }

    public function features(){
    	return $this->hasMany('App\Features');
    }

    public function specs(){
    	return $this->hasMany('App\Specs');
    }

    public function stocks(){
    	return $this->hasMany('App\Stock');
    }

    public function products(){
    	return $this->belongsToMany('App\Product', 'package_product', 'package_id', 'product_id')->withPivot('qty');
    }
}
