<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Events\RiderMove;

class RiderMoveController extends Controller
{
    
    public function move(Request $request, Response $response)
    {
        $riderPos = array();
        $riderPos['lat'] = '16.40159478820968';
        $riderPos['lng'] = '120.59604921627938';
        $riderPos['riderId'] = 1;
        $riderPos['riderName'] = 'John Jonas';

        // $response = event(new RiderMove($riderPos));
        // dump($response);
    }
}
