<?php

namespace App\Models;

use DutchCodingCompany\FilamentSocialite\Models\Contracts\FilamentSocialiteUser as FilamentSocialiteUserContract;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use App\Models\User;

class SocialiteUser implements FilamentSocialiteUserContract
{
    protected $user;

    // Constructor to set the user instance or other dependencies if needed.
    public function __construct(Authenticatable $user = null)
    {
        $this->user = $user;
    }

    // This method should return an instance of a user that implements Authenticatable
    public function getUser(): Authenticatable
    {
        return User::first();
    }

    public static function findForProvider(string $provider, SocialiteUserContract $oauthUser): ?self
    {
        // Example logic to find a user by provider ID or email
        $user = User::where('provider', $provider)
                    ->where('provider_id', $oauthUser->getId())
                    ->first();

        return $user ? new self($user) : null;
    }

    public static function createForProvider(
        string $provider,
        SocialiteUserContract $oauthUser,
        Authenticatable $user
    ): self {
        // Example logic to create a user
        $user = User::create([
            'name' => $oauthUser->getName(),
            'email' => $oauthUser->getEmail(),
            'provider' => $provider,
            'provider_id' => $oauthUser->getId(),
        ]);

        return new self($user);
    }
}
