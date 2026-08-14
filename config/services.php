<?php

use App\User;

return [

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'auth0_management' => [
        'domain' => env('AUTH0_MANAGEMENT_DOMAIN', env('AUTH0_DOMAIN')),
        'client_id' => env('AUTH0_MANAGEMENT_CLIENT_ID'),
        'client_secret' => env('AUTH0_MANAGEMENT_CLIENT_SECRET'),
        'audience' => env('AUTH0_MANAGEMENT_AUDIENCE'),
    ],

    'insightly' => [
        'endpoint' => env('INSIGHTLY_API_ENDPOINT'),
        'key' => env('INSIGHTLY_API_KEY'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

];
