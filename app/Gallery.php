<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Gallery extends Model implements HasMedia
{
	use HasMediaTrait;

	public function registerMediaCollections()
	{
	    $this
	        ->addMediaCollection('gallery')     
	        ->useDisk('media')
	        ->registerMediaConversions(function (Media $media) {
            $this
                ->addMediaConversion('thumb')
                ->width(400)
                ->height(400);
            });
	}

	public function getRouteKeyName()
	{
	    return 'alias';
	}

	protected $fillable = [
		'title',
		'description',
		'alias'
	];

	public $timestamps = false;
}
