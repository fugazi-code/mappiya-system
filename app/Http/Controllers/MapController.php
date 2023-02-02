<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deliveryman;

class MapController extends Controller
{
    public function activeDeliverymen()
    {
        return Deliveryman::where('is_online', '1')->with('user')->get();
    }
}
