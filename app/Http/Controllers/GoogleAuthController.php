<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Log; 

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            Log::info('Google User Data:', [
                'id' => $googleUser->getId(),
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
            ]);

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                ['name' => $googleUser->getName()]
            );

            Auth::login($user);

            // Check the user's role and redirect accordingly
        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        // Default redirection for regular users (if needed)
        // return redirect()->intended('/home');
        return redirect()->intended('/admin');


        } catch (\Exception $e) {
            Log::error("Google OAuth Error: " . $e->getMessage());
            return redirect('/login')->withErrors(['error' => "Google authentication failed: " . $e->getMessage()]);
        }
    }
}
