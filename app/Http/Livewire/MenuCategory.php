<?php

namespace App\Http\Livewire;

use App\Models\MenuCategory as ModelsMenuCategory;
use Illuminate\Support\Str;
use Livewire\Component;

class MenuCategory extends Component
{
    public $restaurant_id;

    public $categoryName;

    public $categories;

    public function render()
    {
        $this->categories = ModelsMenuCategory::query()
            ->where('restaurant_id', $this->restaurant_id)
            ->get()
            ->toArray();

        return view('livewire.menu-category');
    }

    public function store()
    {
        ModelsMenuCategory::create([
            'restaurant_id' => $this->restaurant_id,
            'name' => Str::lower($this->categoryName),
        ]);

        $this->categoryName = '';
    }

    public function destroy($id)
    {
        ModelsMenuCategory::destroy($id);
    }
}
