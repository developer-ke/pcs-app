<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ProviderController;
use Illuminate\Support\Facades\Artisan;

Route::get('/')->middleware(['auth', 'checkAuthenticated']);
Auth::routes();

Route::get('/home')->name('home')->middleware(['auth', 'checkAuthenticated']);
// third paty authentications with laravel socialite
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback'])->name('auth.callback');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    echo 'cache clear succesfully';
});