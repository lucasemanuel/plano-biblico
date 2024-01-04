<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

class AuthProviderController extends Controller
{
    public function redirect()
    {
        return Inertia::location(Socialite::driver('google')->redirect()->getTargetUrl());
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();
        $user = User::firstOrCreate([
            'provider' => 'google',
            'provider_id' => $user->id,
        ], [
            'name' => $user->name,
            'email' => $user->email
        ]);
        Auth::login($user);

        return redirect('/home');
    }
}
