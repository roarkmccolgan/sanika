<?php

namespace App\Listeners;

use App\Events\LeadGenerated;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use RuntimeException;

class AssignLeadAtInsightly implements ShouldQueue
{
    public function __construct(private Client $client) {}

    /**
     * Handle the event.
     */
    public function handle(LeadGenerated $event): void
    {
        $insightly = $event->product->insightly;

        if (! is_array($insightly) || empty($insightly['LEAD_SOURCE_ID']) || empty($insightly['OWNER_USER_ID'])) {
            throw new RuntimeException('The product is missing its Insightly lead source or owner configuration.');
        }

        $key = trim((string) config('services.insightly.key'));

        if ($key === '') {
            throw new RuntimeException('INSIGHTLY_API_KEY is not configured.');
        }

        $this->client->request('POST', $this->endpoint().'Leads', [
            'json' => [
                'LEAD_ID' => 0,
                'LEAD_SOURCE_ID' => $insightly['LEAD_SOURCE_ID'],
                'OWNER_USER_ID' => $insightly['OWNER_USER_ID'],
                'RESPONSIBLE_USER_ID' => $insightly['OWNER_USER_ID'],
                'FIRST_NAME' => $event->first_name,
                'LAST_NAME' => $event->last_name,
                'PHONE' => $event->telephone,
                'MOBILE' => $event->telephone,
                'EMAIL' => $event->email,
            ],
            'auth' => [$key, ''],
        ]);
    }

    private function endpoint(): string
    {
        $endpoint = trim((string) config('services.insightly.endpoint'));

        if ($endpoint === '') {
            throw new RuntimeException('INSIGHTLY_API_ENDPOINT is not configured.');
        }

        if (! str_contains($endpoint, '://')) {
            $endpoint = 'https://'.$endpoint;
        }

        if (filter_var($endpoint, FILTER_VALIDATE_URL) === false || parse_url($endpoint, PHP_URL_SCHEME) !== 'https') {
            throw new RuntimeException('INSIGHTLY_API_ENDPOINT must be a valid HTTPS URL.');
        }

        return rtrim($endpoint, '/').'/';
    }
}
