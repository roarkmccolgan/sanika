<?php

namespace App\Events;

use App\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LeadGenerated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product;
    public $first_name;
    public $last_name;
    public $email;
    public $telephone;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Product $product, $first_name, $last_name, $email, $telephone)
    {
        $this->product = $product;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->telephone = $telephone;
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
