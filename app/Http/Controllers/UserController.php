<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Deliveryman;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::where('id', $id)->with('info')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response, $id)
    {
        $fields = $request->validate([
            'name' => 'string',
            'email' => 'string|unique:users,email',
            'roles' => 'in:3,4',
        ]);
        $user = User::find($id);
        if(!$user) {
            return response ([
                'message' => 'Unable to find user'
            ], 401);
        }
        switch($user['roles']) {
            case 3:
                // $class = Deliveryman::class;
                $deliveryman = Deliveryman::find($user['info_id']);
                $deliveryman->update($request->all());
                break;
            case 4:
                $customer = Customer::find($user['info_id']);
                $customer->update($request->all());
                break;
            default:
                abort(404, "Invalid role");
        };
        $user->update($request->all());
        return User::where('id', $id)->with('info')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }
}
