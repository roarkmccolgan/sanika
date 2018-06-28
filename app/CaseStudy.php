<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class CaseStudy extends Model implements HasMedia
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
	    $this
	        ->addMediaCollection('gallery')     
	        ->useDisk('media');
	    $this
	        ->addMediaCollection('video')     
	        ->useDisk('media');
	}

	protected $fillable = [
		'category_id',
		'title',
		'alias',
		'client',
		'videos',
		'site',
		'scope',
		'background',
		'solution',
		'products',
		'seo_title',
		'seo_keywords',
		'seo_description',
	];
	protected $casts = [
        'products' => 'array',
        'videos' => 'array',
    ];

	public function category(){
		return $this->belongsTo('App\Category');
	}

	public function siteproducts(){
		return $this->belongsToMany('App\Product');
	}
}
