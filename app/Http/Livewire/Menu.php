<?php

namespace App\Http\Livewire;

use App\Models\Menu as MenuModel;
use App\Models\MenuCategory;
use App\Models\Restaurant as RestaurantModel;
use Livewire\Component;

class Menu extends Component
{
    public $restaurant;
    public $menus;
    public $restaurant_id;
    public $menu_id;
    public $name;
    public $category = '';
    public $description;
    public $price;
    public $image;
    public $isAvailable;
    public $count = 0;
    public $categories;
    public $categorySelected;

    protected $rules = [
        'name' => 'required|string',
        'category' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric',
    ];

    protected $queryString = ['restaurant_id'];

    public function mount()
    {
        $this->restaurant = RestaurantModel::find($this->restaurant_id);
        $this->categorySelected = MenuCategory::query()->where('restaurant_id', $this->restaurant_id)->first()->id;
    }

    public function render()
    {
        $this->menus = MenuModel::whereHas('categorized', function ($query) {
            return $query->where('id', $this->categorySelected);
        })
            ->where('restaurant_id', $this->restaurant_id)
            ->get();
        $this->categories = MenuCategory::query()->where('restaurant_id', $this->restaurant_id)->get();

        return view('livewire.menu')->layout('layouts.admin');
    }

    public function store()
    {
        $this->validate();
        MenuModel::create([
            'restaurant_id' => $this->restaurant_id,
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'is_available' => $this->isAvailable,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        $this->mount($this->restaurant_id);
    }

    public function editMenu(int $menu_id)
    {
        $menu = MenuModel::find($menu_id);
        $this->name = $menu->name;
        $this->menu_id = $menu->id;
        $this->price = $menu->price;
        $this->image = $menu->image;
        $this->category = $menu->category;
        $this->description = $menu->description;
    }

    public function update()
    {
        $this->validate();
        MenuModel::where('id', $this->menu_id)->update([
            'restaurant_id' => $this->restaurant_id,
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function destroy($id)
    {
        MenuModel::find($id)->delete();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function resetInput()
    {
        $this->menu_id = null;
        $this->name = '';
        $this->category = '';
        $this->description = '';
        $this->price = '';
        $this->image = '';
    }
}
