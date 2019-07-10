<?php

namespace App\Event\Listener;

use App\Event\Event\newProductEvent;
use App\model\Setting;

//require_once base_path('vendor/telegram-bot/api/src/BotApi.php');

class sendTelegramForNewProductListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function handle(newProductEvent $event)
    {


        if (isset(Setting::whereName('telegram_channel')->first()->value)) {

            $title = $event->product->title;
            $price = $event->product->price;
            $image = $event->product->image;
            $offer = $event->product->price - $event->product->offer;
            $description = $event->product->description;
            $description = $event->product->description;

            $bot = new \TelegramBot\Api\BotApi('878498381:AAH9_voT68V6CYDB1XVK5EGRGMU0j8TLqMw');


            $media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();

            $media->addItem(new \TelegramBot\Api\Types\InputMedia\InputMediaPhoto(url()->to($image)
                ,
                "🛍 نام محصول:  "."  {$title}
💰قیمت:
{$price}
💵 قیمت با تخفیف:
{$offer}
🔴توضیحات:
{$description}
            
            "));
//        $keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
//            [
//                [
//                    ['text' => 'مشاهده محصول', 'url' => 'http://192.168.1.101/laravel-1.am/public/telegram/1']
//                ]
//            ]
//        );

            $bot->sendMediaGroup("@".Setting::whereName('telegram_channel')->first()->value, $media);


        } else {
            abort(400, "آیدی کانال تلگرام را در تنظیمات وارد نمیایید");
        }

    }
}
