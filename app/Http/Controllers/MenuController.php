<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Http\Resources\MenuResource;
use App\Http\Resources\MenuCategoryResource;

class MenuController extends Controller
{
    public function show($restaurantId)
    {
        return MenuResource::collection(Menu::query()->where('restaurant_id', $restaurantId)->get());
    }

    public function categories(Request $request)
    {
        return MenuCategoryResource::collection(
            MenuCategory::query()->where('restaurant_id', $request->get('resturantId'))->get()
        );
    }
}
