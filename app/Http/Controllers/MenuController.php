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

    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|numeric',
            'name' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'selling_price' => 'required|numeric',
            'vendor_price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        return Menu::create($request->all());
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->all());

        return new MenuResource($menu);
    }

    public function destroy(Menu $menu)
    {
      return $menu->delete();
    }
}
