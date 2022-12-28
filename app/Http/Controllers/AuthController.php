<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Deliveryman;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public $info_id = 1;

    // roles: 1 = Admin, 2 = Restaurant, 3 = Rider, 4 = Customer
    public function register(Request $request, Response $response)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'roles' => 'in:3,4',
        ]);

        switch($fields['roles']) {
            case 3:
                $class = Deliveryman::class;
                $request->validate([
                    'phone_no' => 'required|string',
                    'address' => 'required|string',
                    'plate_no' => 'required|numeric',
                    'vehicle_id' => 'numeric',
                    'profile_image' => 'string',
                ]);

                // dump($request['vehicle_id']);

                $vehicle = Vehicle::where('id', $request['vehicle_id'])->get();
                if (!$vehicle) {
                    return response([
                        'message' => 'Invalid vehicle id',
                    ], 401);
                }

                $deliveryman = Deliveryman::create($request->all());
                $this->info_id = $deliveryman['id'];
                break;
            case 4:
                $class = Customer::class;

                $request->validate([
                    'phone_no' => 'required|string',
                    'address' => 'required|string',
                    'profile_image' => 'string',
                ]);

                $customer = Customer::create($request->all());
                $this->info_id = $customer['id'];
                break;
            default:
                abort(404, 'Invalid role');
        }

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'info_id' => $this->info_id,
            'info_type' => $class,
            'roles' => $fields['roles'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
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
        $user = User::where('email', $fields['email'])->first();

        // check password && valid user password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid username or password',
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function show($id)
    {
        return User::where('id', $id)->with('info')->get();
    }
}
