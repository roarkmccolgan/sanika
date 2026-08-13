<?php

return [
    'defaults' => [
        'guard' => 'auth0-session',
        'passwords' => 'users',
    ],

    'guards' => [
        'auth0-session' => [
            'driver' => 'auth0.authenticator',
            'configuration' => 'web',
            'provider' => 'auth0-provider',
        ],
        'auth0-api' => [
            'driver' => 'auth0.authenticator',
            'configuration' => 'api',
            'provider' => 'auth0-provider',
        ],
    ],

    'providers' => [
        'auth0-provider' => [
            'driver' => 'auth0.provider',
            'repository' => 'auth0.repository',
        ],
    ],

    'passwords' => [],
    'password_timeout' => 10800,
];
