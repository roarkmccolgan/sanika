<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('title')     
            ->useDisk('media')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
            $this
                ->addMediaConversion('thumb')
                ->width(200)
                ->height(200);
            $this
                ->addMediaConversion('product')
                ->width(400)
                ->height(400);

        });
    }

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

    public function questions(){
    	return $this->hasMany('App\QA');
    }
}
