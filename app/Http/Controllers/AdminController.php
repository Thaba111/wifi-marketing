<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;



class AdminController extends Controller
{
    // Function to suspend a user
    public function suspendUser(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'reason' => 'required|string|max:255',
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);
    
    
    $user->is_suspended = true; 
    $user->suspension_reason = $request->input('reason'); 
    $user->save();

    return redirect()->back()->with('success', 'User suspended successfully with reason: ' . $request->input('reason'));
}

    // Function to unsuspend a user
    public function unsuspendUser($id)
    {
        $user = User::find($id);

        if ($user && $user->is_suspended) {
            $user->is_suspended = false;
            $user->suspension_reason = null; // Clear the reason
            $user->save();

            return back()->with('success', 'User unsuspended successfully.');
        }

        return back()->with('error', 'User not found or not suspended.');
    }
}
