<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Event\Event\newOrderEvent' => [
            'App\Event\Listener\sendEmailForNewOrderListener',
            'App\Event\Listener\sendTelegramForNewOrderListener',
            'App\Event\Listener\sendNotificationForNewOrderListener',
            'App\Event\Listener\sendSMSForNewOrderListener',
        ],
        'App\Event\Event\newProductEvent' => [
            'App\Event\Listener\sendEmailForNewProductListener',
            'App\Event\Listener\sendTelegramForNewProductListener',
            'App\Event\Listener\sendNotificationForNewProductListener',
        ],
        'App\Event\Event\newTicketEvent' => [
            'App\Event\Listener\sendEmailForNewTicketListener',
            'App\Event\Listener\sendTelegramForNewTicketListener',
            'App\Event\Listener\sendNotificationForNewTicketListener',

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
