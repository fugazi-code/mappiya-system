<?php

use Modules\User\Http\Controllers\ProfilePictureController;
use Modules\User\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'allUsers']);
Route::put('/user/create/customer', [UserController::class, 'createCustomer']);
Route::put('/user/create/deliveryman', [UserController::class, 'createDeliveryman']);
Route::put('/user/create/restaurant', [UserController::class, 'createRestaurant']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/get/user', [UserController::class, 'index']);
    Route::get('/user/detail', [UserController::class, 'detail']);
    Route::patch('/user/update/detail', [UserController::class, 'updateDetail']);
    Route::delete('/user/delete', [UserController::class, 'destroy']);
    Route::put('/profile/photo/update', [ProfilePictureController::class, 'updateProfilePhoto']);
});
