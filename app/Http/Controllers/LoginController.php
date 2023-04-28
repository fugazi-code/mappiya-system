<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function login(LoginRequest $request, Response $response)
    {
        $user = User::where('email', $request->get('email'))->first();
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user_email' => $user->email,
            'user_type' => $user->info_type,
            'token' => $token,
        ];

        return response($response, 201);
    }
}
