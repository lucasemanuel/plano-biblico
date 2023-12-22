<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthProviderController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
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

        return redirect('/dashboard');
    }
}
