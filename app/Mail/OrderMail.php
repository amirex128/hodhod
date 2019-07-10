<?php

namespace App\Mail;

use App\model\Order;
use App\model\Setting;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Order
     */
    public $order;
    public $title;
    public $text;
    public $user;
    public $header_title;
    public $banner_url;
    public $opt;

    /**
     * Create a new message instance.
     *
     * @param  Order  $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->header_title=Setting::where("name", "title")->get("value")->first()["value"];
        $this->banner_url="http://hodhod-gift.ir/reset_password.png";
        $this->title = "سفارش جدید";
        $this->text = "یک سفارش جدید در تاریخ ".Carbon::now()." ثبت شد";
        $this->user = $order->user->name?$order->user->name:"Nan";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Email.Mail');
    }
}
