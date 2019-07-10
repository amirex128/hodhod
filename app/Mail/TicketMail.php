<?php

namespace App\Mail;

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
    public $message;
    public $user;

    /**
     * Create a new message instance.
     *
     * @param \App\model\Ticket $ticket
     */
    public function __construct($title,$message,$user)
    {
        //
        //
        $this->title = $title;
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@hodhod-gift.ir')->view('Email.Ticket');
    }
}
