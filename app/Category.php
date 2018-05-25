<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Category extends Model implements HasMedia
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
                ->width(300)
                ->height(300);
            $this
                ->addMediaConversion('category')
                ->width(400)
                ->height(400);

        });
	}

	public $timestamps = false;

    protected $fillable = ['name','alias','description','parent_id'];

    public function parent() {
		return $this->belongsTo('App\Category', 'parent_id');
	}

	public function subCategories() {
	    return $this->hasMany('App\Category', 'parent_id');
	}
	public function allSubCategories() {
	    return $this->subCategories()->with('allSubCategories');
	}

	public function services(){
    	return $this->belongsToMany('App\Service');
    }

    public function products(){
    	return $this->belongsToMany('App\Product');
    }

    public function casestudies() {
	    return $this->hasMany('App\CaseStudy');
	}
}
