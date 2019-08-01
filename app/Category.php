<?php

namespace App;

use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

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
                ->fit('contain', 300, 300);
                $this
                ->addMediaConversion('category')
                ->fit('contain', 400, 400);
            });
        $this
            ->addMediaCollection('property') //affiliations or other
            ->useDisk('media')
            ->registerMediaConversions(function (Media $media) {
                $this
                ->addMediaConversion('thumb')
                ->fit('contain', 400, 400);
            });
        $this
            ->addMediaCollection('property') //affiliations or other
            ->useDisk('media');
    }

    public $timestamps = false;

    protected $fillable = ['name', 'alias', 'description', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function allSubCategories()
    {
        return $this->subCategories()->with('allSubCategories');
    }

    public function services()
    {
        return $this->belongsToMany(\App\Service::class);
    }

    public function products()
    {
        return $this->belongsToMany(\App\Product::class);
    }

    public function casestudies()
    {
        return $this->hasMany(\App\CaseStudy::class);
    }
}
