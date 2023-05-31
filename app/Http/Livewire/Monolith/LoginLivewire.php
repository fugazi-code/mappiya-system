<?php

namespace App\Http\Livewire\Monolith;

use App\Enums\UserRolesEnum;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginLivewire extends Component
{
    public $email;

    public $password;

    public $auth;

    public $remember = true;

    protected $rules = [
        'email' => 'required|max:255',
        'password' => 'required|max:16',
    ];

    public function render()
    {
        return view('livewire.monolith.login-livewire');
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(
            ['email' => $this->email, 'password' => $this->password, 'roles' => UserRolesEnum::CUSTOMER->value],
            $this->remember
        )) {
            
        }

        $this->auth = 'Login attempt unsuccessful!';
    }
}
