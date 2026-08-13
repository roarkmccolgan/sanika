<?php

namespace App\Services;

use Auth0\Laravel\Service;
use Auth0\SDK\Configuration\SdkConfiguration;

class Auth0Management
{
    private Service $auth0;

    public function __construct()
    {
        $this->auth0 = Service::create([
            'strategy' => SdkConfiguration::STRATEGY_NONE,
            'domain' => config('services.auth0_management.domain'),
            'clientId' => config('services.auth0_management.client_id'),
            'clientSecret' => config('services.auth0_management.client_secret'),
            'audience' => config('services.auth0_management.audience'),
        ]);
    }

    public function usersByEmail(string $email): array
    {
        $response = $this->auth0->management()->usersByEmail()->get($email);

        return Service::json($response) ?? [];
    }

    public function createUser(array $attributes): ?array
    {
        $response = $this->auth0->management()->users()->create(
            connection: 'Username-Password-Authentication',
            body: $attributes,
        );

        return Service::json($response);
    }
}
