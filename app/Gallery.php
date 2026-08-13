<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Gallery extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('gallery')
            ->useDisk('media')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Fit::Contain, 400, 400)
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
