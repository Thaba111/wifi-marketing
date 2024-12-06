<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use App\Mail\WelcomeEmail;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Listen for the Verified event and send the welcome email
        Event::listen(Verified::class, function ($event) {
            $user = $event->user;
    
            // Send the welcome email after email verification
            Mail::to($user->email)->send(new WelcomeEmail($user));
        });
    }
}
