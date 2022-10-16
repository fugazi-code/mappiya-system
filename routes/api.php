<?php

use App\Http\Controllers\SanctumTokenController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliverymanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/user', [UserController::class, 'index']);

// menu routes
Route::get('/menu', [MenuController::class, 'index']);
Route::post('/menu', [MenuController::class, 'store']);
// Route::get('/menu/{id}', [MenuController::class, 'show']);
Route::put('/menu/{id}', [MenuController::class, 'update']);
Route::delete('/menu/{id}', [MenuController::class, 'destroy']);
Route::get('/menu/search/{name}', [MenuController::class, 'search']);

// restaurant routes
Route::get('/restaurant', [RestaurantController::class, 'index']);
Route::get('/restaurant/{id}', [RestaurantController::class, 'show']);
Route::post('/restaurant', [RestaurantController::class, 'store']);
Route::put('/restaurant/{id}', [RestaurantController::class, 'update']);
Route::delete('/restaurant/{id}', [RestaurantController::class, 'destroy']);
Route::get('/restaurant/search/{name}', [RestaurantController::class, 'search']);

// protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('/user/getuser', [UserController::class, 'show']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
    
    Route::put('/customer', [CustomerController::class, 'update']);
    Route::put('/deliveryman', [DeliverymanController::class, 'update']);
});

Route::post('/sanctum/token', [SanctumTokenController::class, 'getToken']);
