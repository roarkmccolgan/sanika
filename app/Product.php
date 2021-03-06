<?php

namespace App;

use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;
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
                ->addMediaConversion('product')
                ->fit('contain', 400, 400);
            });
        $this
            ->addMediaCollection('content');
        $this
            ->addMediaCollection('gallery')
            ->registerMediaConversions(function (Media $media) {
                $this
                ->addMediaConversion('thumb')
                ->fit('contain', 400, 400);
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
        return $this->hasMany(\App\Order::class);
    }

    public function categories()
    {
        return $this->belongsToMany(\App\Category::class);
    }

    public function services()
    {
        return $this->belongsToMany(\App\Service::class);
    }

    public function promotions()
    {
        return $this->belongsToMany(\App\Promotions::class);
    }

    public function features()
    {
        return $this->hasMany(\App\Features::class);
    }

    public function specs()
    {
        return $this->hasMany(\App\Specs::class);
    }

    public function stocks()
    {
        return $this->hasMany(\App\Stock::class);
    }

    public function prices()
    {
        return $this->hasMany(\App\Price::class);
    }

    public function products()
    {
        return $this->belongsToMany(self::class, 'package_product', 'package_id', 'product_id')->withPivot('qty');
    }

    public function questions()
    {
        return $this->hasMany(\App\QA::class);
    }
}
