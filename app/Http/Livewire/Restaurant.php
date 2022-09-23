<?php

namespace App\Http\Livewire;

use WithPagination;
use App\Models\Restaurant as RestaurantModel;
use Illuminate\Http\Request;
use Livewire\Component;

class Restaurant extends Component
{
    protected $paginationTheme = 'bootstrap';
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

    public function store()
    {
        $this->validate();
        RestaurantModel::create([
            "name" => $this->name,
            "address" => $this->address,
            "longitude" => $this->longitude,
            "latitude" => $this->latitude,
        ]);
        $this->reset();
        session()->flash('message', 'New student has been added successfully');
    }

    public function render()
    {
        $restaurants = RestaurantModel::all();
        return view('livewire.restaurant', ['restaurants' => RestaurantModel::paginate(10)])->layout('layouts.admin');
    }

}
