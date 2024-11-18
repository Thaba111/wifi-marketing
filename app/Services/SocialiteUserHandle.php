<?php

namespace App\Services;

use App\Models\User;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Illuminate\Support\Str;

class SocialiteUserHandler
{
    public function handleUser(SocialiteUser $socialiteUser, string $provider): User
    {
        $user = User::where('email', $socialiteUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $socialiteUser->getName(),
                'email' => $socialiteUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialiteUser->getId(),
                'avatar' => $socialiteUser->getAvatar(),
                'password' => bcrypt(Str::random(16)),
            ]);
        }

        return $user;
    }
}