<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterLivewire extends Component
{
    public $name;
    public $email;
    public $password;
    public $phoneNo;
    public $address;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|unique:users,email|email:rfc,dns',
        'password' => 'required',
        'phoneNo' => 'required|unique:customers,phone_no',
        'address' => 'required',
    ];

    public function render()
    {
        return view('livewire.register-livewire');
    }

    public function register()
    {
        $this->validate();

        User::created([
            'name' => $this->name,
            'email' =>
        ]);
    }
}
