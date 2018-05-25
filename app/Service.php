<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
		'title',
		'sub_title',
		'alias',
		'description',
		'seo_title',
		'seo_keywords',
		'seo_description',
	];

    public function categories(){
    	return $this->belongsToMany('App\Category');
    }

    public function products(){
    	return $this->belongsToMany('App\Product', 'package_product', 'package_id', 'product_id')->withPivot('qty');
    }

    public function questions(){
    	return $this->hasMany('App\QA');
    }
}
