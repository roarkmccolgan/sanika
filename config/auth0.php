<?php

declare(strict_types=1);

use Auth0\Laravel\Configuration;
use Auth0\SDK\Configuration\SdkConfiguration;

return Configuration::VERSION_2 + [
    'registerGuards' => true,
    'registerMiddleware' => true,
    'registerAuthenticationRoutes' => true,
    'configurationPath' => null,
    'guards' => [
        'default' => [
            Configuration::CONFIG_STRATEGY => Configuration::get(Configuration::CONFIG_STRATEGY, SdkConfiguration::STRATEGY_NONE),
            Configuration::CONFIG_DOMAIN => Configuration::get(Configuration::CONFIG_DOMAIN),
            Configuration::CONFIG_CLIENT_ID => Configuration::get(Configuration::CONFIG_CLIENT_ID),
            Configuration::CONFIG_CLIENT_SECRET => Configuration::get(Configuration::CONFIG_CLIENT_SECRET),
            Configuration::CONFIG_AUDIENCE => Configuration::get(Configuration::CONFIG_AUDIENCE),
            Configuration::CONFIG_SCOPE => Configuration::get(Configuration::CONFIG_SCOPE),
            Configuration::CONFIG_TOKEN_ALGORITHM => Configuration::get(Configuration::CONFIG_TOKEN_ALGORITHM),
            Configuration::CONFIG_MANAGEMENT_TOKEN => Configuration::get(Configuration::CONFIG_MANAGEMENT_TOKEN),
        ],
        'api' => [
            Configuration::CONFIG_STRATEGY => SdkConfiguration::STRATEGY_API,
        ],
        'web' => [
            Configuration::CONFIG_STRATEGY => SdkConfiguration::STRATEGY_REGULAR,
            Configuration::CONFIG_COOKIE_SECRET => Configuration::get(Configuration::CONFIG_COOKIE_SECRET, env('APP_KEY')),
            Configuration::CONFIG_REDIRECT_URI => Configuration::get(Configuration::CONFIG_REDIRECT_URI, env('APP_URL').'/auth0/callback'),
        ],
    ],
    'routes' => [
        Configuration::CONFIG_ROUTE_INDEX => '/',
        Configuration::CONFIG_ROUTE_CALLBACK => '/auth0/callback',
        Configuration::CONFIG_ROUTE_LOGIN => '/login',
        Configuration::CONFIG_ROUTE_AFTER_LOGIN => '/',
        Configuration::CONFIG_ROUTE_LOGOUT => '/logout',
        Configuration::CONFIG_ROUTE_AFTER_LOGOUT => '/',
    ],
];
