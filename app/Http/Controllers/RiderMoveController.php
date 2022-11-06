<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Events\RiderMove;

class RiderMoveController extends Controller
{
    
    public function move(Request $request, Response $response)
    {
        $request->validate([
            'id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $response = event(new RiderMove($request['id'], $request['latitude'], $request['longitude'], 'move'));
    }

    public function inactive(Request $request, Response $response)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $response = event(new RiderMove($request['id'], 0, 0, 'inactive'));
    }
}
