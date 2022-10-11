<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // roles: 1 = Admin, 2 = Restaurant, 3 = Rider, 4 = Customer
    // TODO connect Customer(classes) creation
    public function register(Request $request, Response $response) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'roles' => 'required|numeric',
        ]);

        switch($fields['roles']) {
            case 2:
                $class = Restaurant::class;
                break;
            case 3:
                $class = Deliveryman::class;
                break;
            default:
                $class = Customer::class;
                break;
        }

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'info_id' => 1,
            'info_type' => $class,
            'roles' => $fields['roles'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request, Response $response)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // find user 
        $user = User::where('email', $fields['email']) -> first();

        // check password && valid user password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response ([
                'message' => 'Invalid username or password'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }
}
