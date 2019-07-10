<?php

namespace App\Event\Listener;

use App\Event\Event\newTicketEvent;
use App\Mail\OrderMail;
use App\Mail\TicketMail;
use App\model\Setting;
use Mail;

class sendEmailForNewTicketListener
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
        Mail::to(Setting::whereName('email')->first()->value)->send(new TicketMail($event->title,$event->message,$event->user));
        if (isset($event->ticket->user->email))
        Mail::to($event->ticket->user->email)->send(new TicketMail($event->title,$event->message,$event->user));
    }
}
