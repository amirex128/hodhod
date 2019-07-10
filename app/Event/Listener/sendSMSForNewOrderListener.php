<?php

namespace App\Event\Listener;

use App\Event\Event\newOrderEvent;
use App\Mail\OrderMail;
use App\model\Setting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class sendSMSForNewOrderListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {


    }



    public function handle(newOrderEvent $event)
    {


        if ($event->sms){
            $client = new \GuzzleHttp\Client();
            $res = $client->request('POST',
                "https://api.kavenegar.com/v1/4C476F76564B394E37374F6769546D4F646E2B6F4170577662514166376C574B/sms/send.json",
                [
                    "query" => [
                        "receptor" => $event->order->user->phone,
                        "message" => "پیک هدیه هدهد از خرید شما سپاس گذار است. کد سفارش شما ".$event->order->id." میباشد."
                    ]
                ]);



            $client = new \GuzzleHttp\Client();
            $res = $client->request('POST',
                "https://api.kavenegar.com/v1/4C476F76564B394E37374F6769546D4F646E2B6F4170577662514166376C574B/sms/send.json",
                [
                    "query" => [
                        "receptor" => Setting::whereName("phone")->first()->value,
                        "message" => "سفارشی جدید در پیک هدیه هدهد ثبت شد. کد سفارش کاربر ".$event->order->id." میباشد."
                    ]
                ]);

        }


    }
}
