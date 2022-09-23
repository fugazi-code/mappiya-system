<?php

use App\Http\Livewire\Customer;
use App\Http\Livewire\DeliveryPeople;
use App\Http\Livewire\Promocodes;
use App\Http\Livewire\Restaurant;
use App\Http\Livewire\Settings;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth:web'])
     ->group(function () {
         Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
         Route::get('/restaurant', Restaurant::class)->name('restaurant');
         Route::get('/customer', Customer::class)->name('customer');
         Route::get('/delivery-people', DeliveryPeople::class)->name('delivery-people');
         Route::get('/promocodes', Promocodes::class)->name('promocodes');
         Route::get('/settings', Settings::class)->name('settings');
         Route::get('/users', Users::class)->name('users');
     });

