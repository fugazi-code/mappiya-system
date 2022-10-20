<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu as MenuModel;
use App\Models\Restaurant;
use Illuminate\Http\Request;


class Menu extends Component
{
    public $restaurant;
    public $menus;

    public $restaurant_id;
    public $name;
    public $category = '';
    public $description;
    public $price;
    public $image;

    protected $rules = [
        'name' => 'required|string',
        'category' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric',
        // 'image' => 'string',
    ];

    // add restaurant_id
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
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editMenu(int $menu_id)
    {
        $menu = MenuModel::find($menu_id);
        if($menu){
            $this->menu_id = $menu->id;
            $this->name = $menu->name;
            $this->category = $menu->category;
            $this->description = $menu->description;
            $this->price = $menu->price;
            $this->image = $menu->image;
        }else{
            return redirect()->route('menu', ['id'=> $restaurant_id]);
        }
    }

    public function update()
    {
        $validatedData = $this->validate();
        MenuModel::where('id',$this->menu_id)->update([
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

    public function deleteMenu(int $menu_id)
    {
        $this->menu_id = $menu_id;
    }

    public function destroy()
    {
        MenuModel::find($this->menu_id)->delete();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->address = '';
        $this->longitude = '';
        $this->latitude = '';
    }

    public function mount($id)
    {
        $restaurant = Restaurant::where('id', $id)->with('menus')->get();
        $this->restaurant_id = $id;

        if($restaurant) {
            $this->menus = $restaurant[0]['menus'];
            $this->restaurant = $restaurant[0];
        }
        return view('livewire.menu')->layout('layouts.admin');
    }

    public function render()
    {
        return view('livewire.menu')->layout('layouts.admin');
    }
}
