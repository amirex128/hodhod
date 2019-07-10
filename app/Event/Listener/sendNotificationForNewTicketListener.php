<?php

namespace App\Event\Listener;

use App\Event\Event\newTicketEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendNotificationForNewTicketListener
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
     * @param  newTicketEvent  $event
     * @return void
     */
    public function handle(newTicketEvent $event)
    {
        //
    }
}
