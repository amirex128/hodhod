<?php

namespace App\Event\Listener;

use App\Event\Event\newProductEvent;
use App\Mail\ProductMail;
use App\model\Setting;
use Mail;

class sendEmailForNewProductListener
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
     *
     * @param  newProductEvent  $event
     * @return void
     */
    public function handle(newProductEvent $event)
    {

        if (isset(Setting::whereName('email')->first()->value)) {
            Mail::to(Setting::whereName('email')->first()->value)->send(new ProductMail($event->product));

        } else {
            abort(400, "ایمیل را در تنظیمات وارد نمیایید");
        }

    }
}
