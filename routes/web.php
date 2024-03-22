<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/register', 'register');
Route::post('/register', RegisterController::class);
Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
});
