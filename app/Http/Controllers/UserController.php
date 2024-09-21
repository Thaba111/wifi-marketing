<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {
        // Validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,marketer,viewer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create and save the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Hash the password
            'role' => $request->role,
            'status' => true,  // Active status by default
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    // Handle user login
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        return response()->json(['user' => $user], 200);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
}
}
