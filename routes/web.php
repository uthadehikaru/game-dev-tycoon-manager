<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::redirect('/login', 'admin/login')->name('login');
Route::view('/register', 'register')->name('register');
Route::post('/register', RegisterController::class);
Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
})->name('logout');
