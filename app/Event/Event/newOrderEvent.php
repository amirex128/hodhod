<?php

namespace App\Event\Event;

use App\model\Order;
use App\model\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Spatie\BladeJavaScript\Transformers\Transformer;

class newOrderEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Product
     */
    /**
     * @var Order|Product
     */
    public $order;
    /**
     * @var bool
     */
    public $sms;


    /**
     * Create a new event instance.
     *
     * @param Order $order
     * @param bool $sms
     */
    public function __construct(Order $order,$sms=false)
    {
        $this->order = $order;
        $this->sms = $sms;
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
