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

    public $menu_category_id = '';

    public $description;

    public $selling_price;

    public $vendor_price;

    public $image;

    public $isAvailable;

    public $count = 0;

    public $categories;

    public $categorySelected;

    protected $rules = [
        'name' => 'required|string',
        'menu_category_id' => 'required',
        'description' => 'required|string',
        'selling_price' => 'required|numeric',
        'vendor_price' => 'required|numeric',
    ];

    protected $queryString = ['restaurant_id'];

    public function mount()
    {
        $this->restaurant = RestaurantModel::find($this->restaurant_id);
        $this->categorySelected = MenuCategory::query()->where('restaurant_id', $this->restaurant_id)->first()->id;
    }

    public function render()
    {
        $this->menus = MenuCategory::find($this->categorySelected)?->menu()->get();

        $this->categories = $this->restaurant->menuCategory()->get();

        return view('livewire.menu')->layout('layouts.admin');
    }

    public function store()
    {
        $this->validate();
        MenuModel::create([
            'restaurant_id' => $this->restaurant_id,
            'name' => $this->name,
            'menu_category_id' => $this->menu_category_id,
            'description' => $this->description,
            'selling_price' => $this->selling_price,
            'vendor_price' => $this->vendor_price,
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
        $this->selling_price = $menu->selling_price;
        $this->vendor_price = $menu->vendor_price;
        $this->image = $menu->image;
        $this->menu_category_id = $menu->menu_category_id;
        $this->description = $menu->description;
    }

    public function update()
    {
        $this->validate();
        MenuModel::where('id', $this->menu_id)->update([
            'name' => $this->name,
            'menu_category_id' => $this->menu_category_id,
            'description' => $this->description,
            'selling_price' => $this->selling_price,
            'vendor_price' => $this->vendor_price,
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
        $this->menu_category_id = '';
        $this->description = '';
        $this->selling_price = '';
        $this->vendor_price = '';
        $this->image = '';
    }
}
