<?php

namespace Modules\Dashboard\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('dashboard::livewire.dashboard')->layout('layouts.admin');
    }
}
