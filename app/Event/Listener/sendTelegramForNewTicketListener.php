<?php

namespace App\Event\Listener;

use App\Event\Event\newTicketEvent;
use App\model\Setting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Telegram\Bot\Laravel\Facades\Telegram;

class sendTelegramForNewTicketListener
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


    public function handle(newTicketEvent $event)
    {
        if (isset(Setting::whereName('telegram_admin')->first()->value)) {

            $title = $event->title;
            $message = $event->message;
            $name = $event->user->name."".$event->user->lname;


            $bot = new \TelegramBot\Api\BotApi('878498381:AAH9_voT68V6CYDB1XVK5EGRGMU0j8TLqMw');


            $media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();

            $media->addItem(new \TelegramBot\Api\Types\InputMedia\InputMediaPhoto(!empty($event->user->avatar)?url()->to($event->user->avatar):url()->to("upload/noImage.png")
                ,
"🛍 عنوان تیکت:  "."  {$title}
مقتن تیکت:
{$message}
💵 نام سفارش دهنده:
{$name}
🔴نام کاربر:
{$name}
            
            "));


            $bot->sendMediaGroup(Setting::whereName('telegram_admin')->first()->value, $media);


        } else {
            abort(400, "آیدی تلگرام مدیر را در تنظیمات وارد نمیایید");
        }


    }
}


