<?php

namespace App\Mail;

use App\model\Product;
use App\model\Setting;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Product
     */
    public $product;
    public $header_title;
    public $banner_url;
    public $title;
    public $user;
    public $text;

    /**
     * Create a new message instance.
     *
     * @param  Product  $product
     */
    public function __construct(Product $product)
    {
        //
        $this->product = $product;
        $this->header_title=Setting::where("name", "title")->get("value")->first()["value"];
        $this->banner_url="http://hodhod-gift.ir/reset_password.png";
        $this->title = "محصول جدید";
        $this->text = "محصول جدید ثبت شد";
        $this->user=Setting::whereName("name")->get("value")->first()["value"];
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
