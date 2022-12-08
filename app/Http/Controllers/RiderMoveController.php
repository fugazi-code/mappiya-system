<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Events\RiderMove;
use App\Models\User;
use App\Models\Deliveryman;

class RiderMoveController extends Controller
{
    public function move(Request $request, Response $response)
    {
        $request->validate([
            'id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $riderId = $request['id'];
        $deliveryman = Deliveryman::where('id', $riderId);
        $deliveryman->update([
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        $response = event(new RiderMove($request['id'], $request['latitude'], $request['longitude'], 'move', ''));
    }

    public function inactive(Request $request, Response $response)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $riderId = $request['id'];
        $deliveryman = Deliveryman::where('id', $riderId);
        $deliveryman->update([
            'is_online' => 0,
        ]);

        $response = event(new RiderMove($request['id'], 0, 0, 'inactive', ''));
    }

    public function active(Request $request, Response $response)
    {
        $request->validate([
            'id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $riderId = $request['id'];
        $deliveryman = Deliveryman::where('id', $riderId);
        $deliveryman->update([
            'is_online' => 1,
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
        ]);
        
        $deliveryman_name = User::where('id', $request['id'])->first();
        $response = event(new RiderMove($request['id'], $request['latitude'], $request['longitude'], 'active', $deliveryman_name['name']));
    }
}
