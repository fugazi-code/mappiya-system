<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    public function update(Request $request, Response $response)
    {
        $user_id = $request->user();
        if ($user_id['roles'] != 4) {
            return response([
                'message' => 'Invalid user role',
            ], 401);
        }

        $fields = $request->validate([
            'name' => 'string',
            'email' => 'string|unique:users,email',
            'roles' => 'in:3,4',
        ]);
        $user = User::find($user_id['id']);
        if (! $user) {
            return response([
                'message' => 'Unable to find user',
            ], 401);
        }

        $customer = Customer::find($user['info_id']);
        $customer->update($request->all());

        $user->update($request->all());

        return response([
            'message' => 'Success',
        ], 201);
    }

    public function list()
    {
        $customers = Customer::paginate();

        return CustomerResource::collection($customers);
    }
}
