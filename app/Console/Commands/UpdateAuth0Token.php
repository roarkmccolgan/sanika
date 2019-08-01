<?php

namespace App\Console\Commands;

use App\Auth0Token;
use Illuminate\Console\Command;
use Auth0\SDK\API\Authentication;

class UpdateAuth0Token extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth0:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a new management token for Auth0';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $api = new Authentication(env('AUTH0_MANAGEMENT_DOMAIN'), env('AUTH0_MANAGEMENT_CLIENT_ID'), env('AUTH0_MANAGEMENT_CLIENT_SECRET'));
        $token = $api->client_credentials([
          'audience' => env('AUTH0_MANAGEMENT_AUDIENCE'),
        ]);
        $dbToken = Auth0Token::updateOrCreate(
            ['id' => 1],
            [
                'access_token' => $token['access_token'],
                'token_type' => $token['token_type'],
            ]
        );
        $this->info('New Token Generated!');
        $this->info($token['access_token']);
    }
}
