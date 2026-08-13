<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
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
                $this
                    ->addMediaConversion('hero')
                    ->fit(Fit::Crop, 1600, 500);
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
        'publish',
    ];

    protected $casts = [
        'products' => 'array',
        'event' => 'array',
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
