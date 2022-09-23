<?php

namespace App\Http\Livewire;

use App\Models\Restaurant as RestaurantModel;
use Illuminate\Http\Request;
use Livewire\Component;

class Restaurant extends Component
{
    public $name;
    public $address;
    public $longitude;
    public $latitude;

    protected $rules = [
        'name' => ['required', 'max:20'],
        'address' => ['required'],
        'longitude' => ['required'],
        'latitude' => ['required'],
    ];

    public function submit()
    {
        $this->validate();

        RestaurantModel::create([
            "name" => $this->name,
            "address" => $this->address,
            "longitude" => $this->longitude,
            "latitude" => $this->latitude,
        ]);

        session() -> flash('success', 'Restaurant created');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.restaurant')->layout('layouts.admin');
    }
}
