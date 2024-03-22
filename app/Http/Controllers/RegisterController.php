<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $request->validated();
        $user = $request->only('name','email','password');
        $user['password'] = Hash::make($user['password']);
        $user = User::create($user);
        Auth::login($user);
        return redirect()->route('filament.admin.pages.dashboard');
    }
}
