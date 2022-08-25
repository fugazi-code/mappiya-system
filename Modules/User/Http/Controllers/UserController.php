<?php

namespace Modules\User\Http\Controllers;

use App\Models\AssignedUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return User::query()->find($request->get('id'));
    }

    public function details(Request $request)
    {
        return app(AssignedUser::class)->getDetails($request->get('id'));
    }
}
