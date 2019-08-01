<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\Event::class => [
            \App\Listeners\EventListener::class,
        ],
        \App\Events\OrderCreated::class => [
            \App\Listeners\SendOrderNotification::class,
        ],
        \App\Events\LeadGenerated::class => [
            \App\Listeners\AssignLeadAtInsightly::class,
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
