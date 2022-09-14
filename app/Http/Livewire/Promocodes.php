<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Promocodes extends Component
{
    public function render()
    {
        return view('livewire.promocodes')->layout('layouts.admin');
    }
}
