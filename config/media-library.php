<?php

$config = require base_path('vendor/spatie/laravel-medialibrary/config/media-library.php');

return array_replace($config, [
    'disk_name' => env('MEDIA_DISK', 'media'),
    'queue_conversions_by_default' => env('QUEUE_CONVERSIONS_BY_DEFAULT', false),
]);
