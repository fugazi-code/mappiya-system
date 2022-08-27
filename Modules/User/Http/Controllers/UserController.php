<?php

namespace Modules\User\Http\Controllers;

use App\Models\AssignedUser;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return User::query()->find($request->get('id'));
    }

    public function allUsers()
    {
        return User::query()->select(['email'])->get();
    }

    public function details(Request $request)
    {
        return app(AssignedUser::class)->getDetails($request->get('id'));
    }

    public function updateDetail(Request $request)
    {
        return app(AssignedUser::class)->updateDetail($request->all());
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'roles' => 'required',
        ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'roles' => $request->get('roles')
        ]);

        return ['message' => 'New Account Has Been Added! ID: ' . $user->id];
    }
}
