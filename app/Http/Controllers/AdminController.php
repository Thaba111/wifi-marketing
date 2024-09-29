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
        // Fetch the user by their ID
        $user = User::find($id);

        if ($user) {
            // Check if the user is already suspended
            if ($user->is_suspended) {
                return back()->with('error', 'User is already suspended.');
            }

            // Validate the reason for suspension
            $request->validate([
                'reason' => 'required|string|max:255',
            ]);

            // Suspend the user and save the reason
            $user->is_suspended = true;
            $user->suspension_reason = $request->input('reason'); // Assuming 'suspension_reason' column exists
            $user->save();

            // Optionally, send an email notification to the user about the suspension
            Mail::raw("You have been suspended for the following reason: " . $request->input('reason'), function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Account Suspended');
            });

            return back()->with('success', 'User suspended successfully and reason provided.');
        }

        return back()->with('error', 'User not found.');
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
