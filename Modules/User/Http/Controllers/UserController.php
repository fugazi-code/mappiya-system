<?php

namespace Modules\User\Http\Controllers;

use App\Http\Resources\DetailResource;
use App\Models\AssignedUser;
use App\Models\Restaurant;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Ui\Presets\React;

class UserController extends Controller
{
    public function index()
    {
       return PersonalAccessToken::findToken(request()->bearerToken())->first()->tokenable;
    }

    public function allUsers()
    {
        return User::query()->select(['email'])->get();
    }

    public function detail()
    {
        $model = PersonalAccessToken::findToken(request()->bearerToken())->first()->tokenable;
        
        return new DetailResource(User::query()->find($model->id)->info);
    }

    public function updateDetail(Request $request)
    {
        $model = PersonalAccessToken::findToken(request()->bearerToken())->first()->tokenable;
        $model->info_type::query()->find($model->info_id)->update($request->all());

        return $model->info_type::query()->find($model->info_id);
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
