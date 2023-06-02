<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Customer;
use App\Enums\UserRolesEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'roles' => UserRolesEnum::CUSTOMER,

        ]);

        $customer = Customer::create([
            'phone_no' => $this->phoneNo,
            'address' => $this->phoneNo,
            'profile_image' => asset('images/default.jpg'),
            'is_blocked' => 0,
            'is_active' => 1,
        ]);

        $customer->user()->save($user);

        Auth::loginUsingId($user->id);

        return redirect()->route('directory');
    }
}
