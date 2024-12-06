<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('auth.register'); // Points to the registration view
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:8',
    ]);

    // Create the user
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

    // Send email verification notification
    $user->sendEmailVerificationNotification();

    // Redirect to the login page with a success message
    return redirect()->route('dashboard')->with('status', 'Registration successful! Please check your email to verify your account before logging in.');
}

    protected function registered(Request $request, $user)
{
    return redirect('/email/verify');
}

}
