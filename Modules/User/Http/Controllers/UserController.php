<?php

namespace Modules\User\Http\Controllers;

use App\Http\Resources\DetailResource;
use App\Models\Customer;
use App\Models\Deliveryman;
use App\Models\Restaurant;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    public function index()
    {
        return PersonalAccessToken::findToken(request()->bearerToken())->first()->tokenable;
    }

    public function allUsers()
    {
        return User::query()->select(['email', 'info_type'])->get();
    }

    public function detail()
    {
        $model = PersonalAccessToken::findToken(request()->bearerToken())->first()->tokenable;
        $user = User::query()->find($model->id);

        return new DetailResource($user->info, $user->roles);
    }

    public function updateDetail(Request $request)
    {
        $model = PersonalAccessToken::findToken(request()->bearerToken())->first()->tokenable;
        $model->info_type::query()->updateOrCreate(['id' => $model->info_id], $request->all());

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

        switch ($request->get('roles')) {
            case 2:
                $factory = Restaurant::query()->create();
                $class = Restaurant::class;
                break;
            case 3:
                $factory = Deliveryman::query()->create();
                $class = Deliveryman::class;
                break;
            default:
                $factory = Customer::query()->create();
                $class = Customer::class;
                break;
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'roles' => $request->get('roles'),
            'info_id' => $factory,
            'info_type' => $class,
        ]);

        return ['message' => 'New Account Has Been Added! ID: '.$user->id];
    }

    public function createCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'roles' => 'required',
        ]);

        $result = Customer::query()->create([
            'phone_no' => $request->get('phone_no'),
            'address' => $request->get('address'),
            'profile_image' => $request->get('profile_image'),
            'is_blocked' => $request->get('is_blocked'),
            'is_active' => $request->get('is_active'),
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'roles' => $request->get('roles'),
            'info_id' => $result,
            'info_type' => Customer::class,
        ]);

        return ['message' => 'New Account for customer has been added!'];
    }

    public function createDeliveryman(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'roles' => 'required',
        ]);

        $result = Deliveryman::query()->create([
            'phone_no' => $request->get('phone_no'),
            'address' => $request->get('address'),
            'plate_no' => $request->get('plate_no'),
            'vehicle_id' => $request->get('vehicle_id'),
            'profile_image' => $request->get('profile_image'),
            'is_blocked' => $request->get('is_blocked'),
            'is_active' => $request->get('is_active'),
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'roles' => $request->get('roles'),
            'info_id' => $result,
            'info_type' => Deliveryman::class,
        ]);

        return ['message' => 'New Account for deliveryman has been added!'];
    }

    public function createRestaurant(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'roles' => 'required',
        ]);

        $result = Restaurant::query()->create([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'longitude' => $request->get('longitude'),
            'latitude' => $request->get('latitude'),
            'is_available' => $request->get('is_available'),
            'is_blocked' => $request->get('is_blocked'),
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'roles' => $request->get('roles'),
            'info_id' => $result,
            'info_type' => Deliveryman::class,
        ]);

        return ['message' => 'New Account for Restaurant has been added!'];
    }

    public function destroy()
    {
        $model = PersonalAccessToken::findToken(request()->bearerToken())->first()->tokenable;
        User::destroy($model->id);

        return ['message' => 'User has been deleted!'];
    }
}
