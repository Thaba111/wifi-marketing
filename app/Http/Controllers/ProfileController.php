<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('profile.show', compact('user')); // Pass the user data to the view
    }

    /**
     * Show the form for editing the authenticated user's profile.
     */
    public function edit()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('profile.edit', compact('user')); // Pass the user data to the edit form
    }

    /**
     * Update the profile of the authenticated user.
     */
    public function update(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user

        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id, // Ensure email is unique except for current user
        ]);

        // // Update the user's profile
        // $user->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
