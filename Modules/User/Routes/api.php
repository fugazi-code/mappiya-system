<?php

use Modules\User\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users', [UserController::class, 'allUsers']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/get/user', [UserController::class, 'index']);
    Route::post('/user/details', [UserController::class, 'details']);
    Route::post('/user/update/detail', [UserController::class, 'updateDetail']);
});
