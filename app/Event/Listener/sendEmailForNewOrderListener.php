<?php

namespace App\Event\Listener;

use App\Event\Event\newOrderEvent;
use App\Mail\OrderMail;
use App\model\Setting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class sendEmailForNewOrderListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {


    }

    /**
     * Handle the event.
     *
     * @param  newOrderEvent  $event
     * @return void
     */
    public function handle(newOrderEvent $event)
    {
        if ($event->sms==false){
            Mail::to(Setting::whereName('email')->first()->value)->send(new OrderMail($event->order));
            Mail::to($event->order->user->email)->send(new OrderMail($event->order));
        }
    }
}
