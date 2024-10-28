<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider()
    {
        // return Socialite::driver('google')->redirect();
        return Socialite::driver('google')->with(['http' => ['verify' => false]])->redirect();
    }


    public function handleProviderCallback()
    {
        try {
            // $user = Socialite::driver('google')->user();
            $user = Socialite::driver('google')->stateless()->user();
        } catch (Exception $exception) {
            Log::error('Error retrieving user from Google: ' . $exception->getMessage());
            return redirect('/');
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser);
        } else {
            $newUser = new  User;

            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            $newUser->save();
            auth()->login($newUser);
        }
        return redirect('/dashboard');
    }
}
