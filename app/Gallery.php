<?php

namespace App;

use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

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
                ->fit('contain', 400, 400)
                ->withResponsiveImages();
            });
    }

    public function getRouteKeyName()
    {
        return 'alias';
    }

    protected $fillable = [
        'title',
        'description',
        'alias',
    ];

    public $timestamps = false;
}
