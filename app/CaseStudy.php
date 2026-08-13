<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CaseStudy extends Model implements HasMedia
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
                    ->fit(Fit::Contain, 400, 400);
                $this
                    ->addMediaConversion('hero')
                    ->fit(Fit::Crop, 1600, 500);
            });
        $this
            ->addMediaCollection('gallery')
            ->useDisk('media')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Fit::Contain, 400, 400);
            });
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
        'where',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function siteproducts()
    {
        return $this->belongsToMany(Product::class);
    }
}
