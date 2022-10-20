<?php

namespace App\Http\Livewire;

use WithPagination;
use App\Models\Restaurant as RestaurantModel;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Validation\Validator;

class Restaurant extends Component
{
    public $name;
    public $address;
    public $longitude;
    public $latitude;

    public $restaurant_id;

    protected $rules = [
        'name' => ['required'],
        'address' => ['required'],
        'longitude' => ['required'],
        'latitude' => ['required'],
    ];

    public function store()
    {
        $validatedData = $this->validate();
        RestaurantModel::create($validatedData);
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editRestaurant(int $restaurant_id)
    {
        $restaurant = RestaurantModel::find($restaurant_id);
        if($restaurant){
            $this->restaurant_id = $restaurant->id;
            $this->name = $restaurant->name;
            $this->address = $restaurant->address;
            $this->longitude = $restaurant->longitude;
            $this->latitude = $restaurant->latitude;
        }else{
            return redirect()->to('/restaurant');
        }
    }

    public function update()
    {
        $validatedData = $this->validate();
        RestaurantModel::where('id',$this->restaurant_id)->update([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'longitude' => $validatedData['longitude'],
            'latitude' => $validatedData['latitude'],
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function deleteRestaurant(int $restaurant_id)
    {
        $this->restaurant_id = $restaurant_id;
    }

    public function destroy()
    {
        RestaurantModel::find($this->restaurant_id)->delete();
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

    public function menu($id)
    {
        return redirect()->route('menu', ['id'=> $id]);
    }

    public function render()
    {
        $restaurants = RestaurantModel::all();
        return view('livewire.restaurant', ['restaurants' => $restaurants])->layout('layouts.admin');
    }

}
