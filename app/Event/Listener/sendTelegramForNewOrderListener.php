<?php

namespace App\Event\Listener;

use App\Event\Event\newOrderEvent;
use App\model\Setting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Telegram\Bot\Laravel\Facades\Telegram;

class sendTelegramForNewOrderListener
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


    public function handle(newOrderEvent $event)
    {

        if ($event->sms==false){
            if (isset(Setting::whereName('telegram_admin')->first()->value)) {

                $id = $event->order->id;
                $price = $event->order->total_price;
                $name = $event->order->user->name."".$event->order->user->lname;
                $address = $event->order->address;


                $bot = new \TelegramBot\Api\BotApi('878498381:AAH9_voT68V6CYDB1XVK5EGRGMU0j8TLqMw');


                $media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();

                $media->addItem(new \TelegramBot\Api\Types\InputMedia\InputMediaPhoto(!$event->order->user->avatar==""||!$event->order->user->avatar==null?url()->to($event->order->user->avatar):url()->to("upload/noImage.png")
                    ,
                    "🛍 شناسه سفارش:  "."  {$id}
💰قیمت:
{$price}
💵 نام سفارش دهنده:
{$name}
🔴آدرس گیرنده:
{$address}
            
            "));


                $bot->sendMediaGroup(Setting::whereName('telegram_admin')->first()->value, $media);


            } else {
                abort(400, "آیدی تلگرام مدیر را در تنظیمات وارد نمیایید");
            }
        }

    }


}
