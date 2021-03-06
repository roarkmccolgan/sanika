<?php

namespace App\Listeners;

use GuzzleHttp\Client;
use App\Events\LeadGenerated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignLeadAtInsightly implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LeadGenerated  $event
     * @return void
     */
    public function handle(LeadGenerated $event)
    {
        $client = new Client(['base_uri' => env('INSIGHTLY_API_ENDPOINT')]);
        //, ['auth' => ['username', 'password']]
        $response = $client->request('POST', 'Leads', [
            'json'=> [
                'LEAD_ID' => 0,
                'LEAD_SOURCE_ID'=> $event->product->insightly['LEAD_SOURCE_ID'],
                'OWNER_USER_ID' => $event->product->insightly['OWNER_USER_ID'],
                'RESPONSIBLE_USER_ID' => $event->product->insightly['OWNER_USER_ID'],
                'FIRST_NAME' => $event->first_name,
                'LAST_NAME' => $event->last_name,
                'PHONE_NUMBER' => $event->telephone,
                'EMAIL_ADDRESS' => $event->email,
                'CUSTOMFIELDS' => $event->product->insightly['CUSTOMFIELDS'],
            ],
            'auth' => [env('INSIGHTLY_API_KEY'), ''],
        ]);
    }
}
