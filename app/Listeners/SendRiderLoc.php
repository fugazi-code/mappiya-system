<?php

namespace App\Listeners;

use App\Events\RiderMove;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendRiderLoc
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\RiderMove  $event
     * @return void
     */
    public function handle(RiderMove $event)
    {
        //
    }
}
