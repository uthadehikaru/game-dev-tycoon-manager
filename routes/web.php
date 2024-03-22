<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/register', 'register');
Route::post('/register', RegisterController::class);
