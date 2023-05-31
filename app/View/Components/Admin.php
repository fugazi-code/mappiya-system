<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Admin extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('layouts.admin');
    }
}
