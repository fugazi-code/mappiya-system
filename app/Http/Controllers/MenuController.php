<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuResource;
use App\Models\Menu;

class MenuController extends Controller
{
    public function show($id)
    {
        return MenuResource::collection(Menu::query()->where('restaurant_id', $id)->get());
    }
}
