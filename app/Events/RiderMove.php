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
    public int $id;
    public float $latitude;
    public float $longitude;
    public string $action;
    public string $name;
    // public array $riderPos;
    public $params;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id, $latitude, $longitude, $action, $name)
    // public function __construct($riderPos)
    {
        // dump($id);
        $this->id = $id;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->action = $action;
        $this->name = $name;
        // $this->params[0] = $id;
        // $params['latitude']->$latitude;
        // $this->riderPos = $params;
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
