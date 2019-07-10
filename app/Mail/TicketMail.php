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

    /**
     * Create a new message instance.
     *
     * @param \App\model\Ticket $ticket
     */
    public function __construct($title,$message,$user,$header_title="Title")
    {
        //
        //
        $this->header_title=Setting::where("name", "title")->get("value")->first()["value"];
        $this->banner_url="http://hodhod-gift.ir/reset_password.png";
        $this->title = $title;
        $this->text = $message;
        $this->user = $user;
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
