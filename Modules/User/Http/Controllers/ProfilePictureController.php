<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProfilePicture;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Http\Request;

class ProfilePictureController extends Controller
{
    public function updateProfilePhoto(Request $request)
    {
        dd($request->file('photo'));
        $model = PersonalAccessToken::findToken(request()->bearerToken())->first()->tokenable;

        return ProfilePicture::query()->where('user_id', $model->id);
    }
}
