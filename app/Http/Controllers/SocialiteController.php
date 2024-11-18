<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    // Redirect the user to the provider page
    public function authProviderRedirect($provider)
    {
        if ($provider) {
            return Socialite::driver($provider)->redirect();

        }
        abort(404);
    }

    // Handle callback from Google
    public function socialAuthentication($provider)
    {
        
        try {
            // Ensuring stateless to prevent session issues
            $socialUser = Socialite::driver($provider)->user();
    
            // Check if the user exists in the database
            $user = User::where('auth_provider_id', $socialUser->id)->first();
    
            if ($user) {
                // If the user already exists, log them in
                Auth::login($user);
                return redirect()->route('/admin'); // Redirect to the desired route
            } else {
                // If the user doesn't exist, create a new one
                $userData = User::create([
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'password' => bcrypt(Str::random(16)),
                    'auth_provider_id' => $socialUser->id,
                    'auth_provider' => $provider,
                ]);
    
                if ($userData) {
                    Auth::login($userData);
                    return redirect()->route('/admin'); 
                
                }
            }
    
            abort(404); 
    
        } catch (\Exception $e) {
            return Redirect::to('/login')->withErrors(['error' => 'Unable to login with ' . ucfirst($provider)]);
        }
    }
    

}
