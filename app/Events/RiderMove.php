<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RiderMove implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public float $latitude;
    public float $longitude;
    // public array $riderPos;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($longitude, $latitude)
    // public function __construct($riderPos)
    {
        // dump($riderPos);
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        // $this->riderPos = $riderPos;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('mappiya');
        // return new PrivateChannel('mappiya');
    }
}
