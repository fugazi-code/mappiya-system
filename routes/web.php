<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth:web'])
     ->group(function () {
         Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
     });

