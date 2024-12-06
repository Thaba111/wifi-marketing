<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile($username)
    {
        // Fetch user by username
        $user = User::where('username', $username)->firstOrFail();

        return view('profile', compact('user'));
    }

    public function editProfile()
    {
        $user = auth()->user();

        return view('settings.profile', compact('user'));
    }
}

