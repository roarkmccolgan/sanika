<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\SendOrder;
use Illuminate\Support\Facades\Mail;

class SendOrderNotification
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
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $addressess = [
            ['email' => 'roarkmccolgan@gmail.com', 'name' => 'Roark McColgan'],
            ['email' => 'solar@maximtrading.co.za', 'name' => 'Michael McMaster'],
            ['email' => 'Heath@maximtrading.co.za', 'name' => 'Heath McMaster'],
        ];
        Mail::to()
            ->queue(new SendOrder($event->order));
    }
}
