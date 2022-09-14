<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Restaurant extends Component
{
    public function render()
    {
        return view('livewire.restaurant')->layout('layouts.admin');
    }
}
