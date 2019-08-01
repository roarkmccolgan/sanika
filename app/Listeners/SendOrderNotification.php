<?php

namespace App\Listeners;

use App\Mail\SendOrder;
use App\Events\OrderCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $addressess = [
            ['email'=>'roarkmccolgan@gmail.com', 'name'=>'Roark McColgan'],
            ['email'=>'solar@maximtrading.co.za', 'name'=>'Michael McMaster'],
            ['email'=>'Heath@maximtrading.co.za', 'name'=>'Heath McMaster'],
        ];
        Mail::to()
            ->queue(new SendOrder($event->order));
    }
}
