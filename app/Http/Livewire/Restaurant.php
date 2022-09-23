<?php

namespace App\Http\Livewire;

use App\Models\Restaurant as RestaurantModel;
use Livewire\Component;

class Restaurant extends Component
{
    public $name;
    public $address;
    public $longitude;
    public $latitude;
    public $is_available;
    public $is_blocked;

    protected $attributes = [
        'is_available' => 0,
        'is_blocked' => 0,
    ];

    protected $rules = [
        'name' => 'required|max:20',
        'address' => 'required',
        'longitude' => 'required',
        'latitude' => 'required',
    ];

    public function render()
    {
        return view('livewire.restaurant')->layout('layouts.admin');
    }

    public function updated($propertyName) {

        $this->validateOnly($propertyName);
    }

    public function store()
    {
        dd($this->name);
        // $validatedData = $this->validate();
        // $longitude_float = (float)$this->longitude;
        // $latitude_float = (float)$this->latitude;
        // $validatedData = $this->validate([
        //     'name' => 'required',
        //     'address' => 'required',
        //     'longitude' => 'required',
        //     'latitude' => 'required',
        // ]);

        RestaurantModel::create([
            "name" => $this->name,
            "address" => $this->address,
            "longitude" => $this->longitude,
            "latitude" => $this->latitude,
            "is_available" => $this->is_available,
            "is_blocked" => $this->is_blocked,
        ]);

        // session() -> flash('success', 'Restaurant created');

        // $this->reset();
    }

}
