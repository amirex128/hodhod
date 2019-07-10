<?php

namespace App\Event\Event;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class newTicketEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $title;
    public $message;
    public $user;

    /**
     * Create a new event instance.
     *
     * @param $title
     * @param $message
     * @param $user
     */
    public function __construct($title,$message,$user)
    {
        //
        $this->title = $title;
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
