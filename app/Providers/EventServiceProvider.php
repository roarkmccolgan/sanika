<?php

namespace App\Providers;

use App\Events\LeadGenerated;
use App\Events\OrderCreated;
use App\Listeners\AssignLeadAtInsightly;
use App\Listeners\EventListener;
use App\Listeners\SendOrderNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\Event::class => [
            EventListener::class,
        ],
        OrderCreated::class => [
            SendOrderNotification::class,
        ],
        LeadGenerated::class => [
            AssignLeadAtInsightly::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
