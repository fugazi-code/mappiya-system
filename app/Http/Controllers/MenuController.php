<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuCategoryResource;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function categories(Restaurant $restaurant)
    {
        $menuCategory = $restaurant->load('menuCategory.menu')->menuCategory;

        return MenuCategoryResource::collection($menuCategory);
    }

    public function store(Request $request)
    {
        $request->validate([
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
