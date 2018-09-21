<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class News extends Model implements HasMedia
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
                ->fit('contain', 300, 300);
            $this
                ->addMediaConversion('category')
                ->fit('contain', 400, 400);
            $this
                ->addMediaConversion('hero')
                ->fit('crop', 1600, 500);

        });
	    $this
            ->addMediaCollection('content');
	    $this
	        ->addMediaCollection('attachments')     
	        ->useDisk('media');
	}

	protected $fillable = [
		'category_id',
		'title',
		'sub_title',
		'alias',
		'publish',
		'active',
		'products',
		'article',
		'seo_title',
		'seo_keywords',
		'seo_description',
		'event',
	];
	protected $dates = [
        'publish'
    ];
	protected $casts = [
        'products' => 'array',
        'event' => 'array',
    ];

	public function category(){
		return $this->belongsTo('App\Category');
	}

	public function siteproducts(){
		return $this->belongsToMany('App\Product');
	}
}
