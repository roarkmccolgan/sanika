<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('title')
            ->useDisk('media')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Fit::Contain, 300, 300);
                $this
                    ->addMediaConversion('category')
                    ->fit(Fit::Contain, 400, 400);
            });
        $this
            ->addMediaCollection('property') // affiliations or other
            ->useDisk('media')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Fit::Contain, 400, 400);
            });
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
        return $this->belongsToMany(Service::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function casestudies()
    {
        return $this->hasMany(CaseStudy::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
