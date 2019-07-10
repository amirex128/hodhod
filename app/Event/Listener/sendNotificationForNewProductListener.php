<?php

namespace App\Event\Listener;

use App\Event\Event\newProductEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendNotificationForNewProductListener
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
     * @param  newProductEvent  $event
     * @return void
     */
    public function handle(newProductEvent $event)
    {
        //
    }
}
