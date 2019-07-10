<?php

namespace App\Mail;

use App\model\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var \App\model\Ticket
     */
    public $title;
    public $text;
    public $user;
    public $header_title;
    public $banner_url;
    public $opt;

    /**
     * Create a new message instance.
     *
     * @param \App\model\Ticket $ticket
     */
    public function __construct($title,$message,$user)
    {
        //
        //
        $this->header_title=Setting::where("name", "title")->get("value")->first()["value"];
        $this->banner_url="http://hodhod-gift.ir/reset_password.png";
        $this->title = "تیکت";
        $this->text="تیکت در سیستم ثبت شد";
        $this->user = $user->name." ".$user->lname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->from('support@hodhod-gift.ir')->view('Email.Ticket',compact(["title","message","user"]));
        return $this->from('support@hodhod-gift.ir')->view('Email.Mail');
    }
}
