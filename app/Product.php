<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
    use Searchable;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = [
            'objectID' => $this->id,
            'name' => $this->name,
            'description' => strip_tags($this->description),
            'url' => '/categories/'.$this->path.'/products/'.$this->alias,
            'tags' => $this->uses,
        ];

        return $array;
    }

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
                    ->addMediaConversion('product')
                    ->fit(Fit::Contain, 400, 400);
            });
        $this
            ->addMediaCollection('content');
        $this
            ->addMediaCollection('gallery')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Fit::Contain, 400, 400);
            });
        $this
            ->addMediaCollection('application');
        $this
            ->addMediaCollection('technical');
        $this
            ->addMediaCollection('specifications');
    }

    protected $casts = [
        'uses' => 'array',
        'insightly' => 'array',
    ];

    public function getPathAttribute($value)
    {
        return collect($this->categories()->get())->implode('alias', '/');
    }

    protected $fillable = [
        'sku',
        'name',
        'alias',
        'strapline',
        'description',
        'how_it_works',
        'application',
        'uses_intro',
        'uses',
        'insightly',
        'price',
        'price_install',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'insightly',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotions::class);
    }

    public function features()
    {
        return $this->hasMany(Features::class);
    }

    public function specs()
    {
        return $this->hasMany(Specs::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function products()
    {
        return $this->belongsToMany(self::class, 'package_product', 'package_id', 'product_id')->withPivot('qty');
    }

    public function questions()
    {
        return $this->hasMany(QA::class);
    }
}
