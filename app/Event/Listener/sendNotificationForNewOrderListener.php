<?php

namespace App\Event\Listener;

use App\Event\Event\newOrderEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendNotificationForNewOrderListener
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
     * @param  newOrderEvent  $event
     * @return void
     */
    public function handle(newOrderEvent $event)
    {
        //
    }
}
