<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Restaurant    ;

Auth::routes();

Route::middleware(['auth:web'])
     ->group(function () {
         Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
         Route::get('/restaurant', Restaurant::class) ->name('restaurant');
     });

