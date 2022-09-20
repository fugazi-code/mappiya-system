<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeliveryPeople extends Component
{
    public function render()
    {
        return view('livewire.delivery-people')->layout('layouts.admin');
    }
}
