<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function dashboard()
    {
        $user = auth()->user(); // Get the currently authenticated user
        return view('admin.dashboard', compact('user')); // Pass the user data to the view
    }
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


        public function showProfile()
        
        {
                $user = auth()->user();
                if (!$user) {
                    abort(403, 'Unauthorized action.');
                }

                return view('admin.profile', compact('user'));
            }

       
        public function editProfile()
        {
            $user = auth()->user(); // Fetch the authenticated user
            return view('admin.edit-profile', compact('user')); // Return an edit profile view
        }

       
        public function editAvatar()
        {
            $user = auth()->user(); // Get the logged-in user
            return view('admin.edit-avatar', compact('user')); // Return a view for editing the avatar
        }


        public function updateProfile(Request $request)
        {
            $user = auth()->user();
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
        }

    
        public function updateAvatar(Request $request)
        {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $user = auth()->user();

            // Handle the file upload
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = time() . '.' . $file->getClientOriginalExtension();
            
                // Store the file in the public disk and save the relative path
                $path = $file->storeAs('avatars', $filename, 'public');
                
                // Save the avatar path to the database
                $user->update([
                    'avatar' => basename($path), // Store the filename only
                ]);
            }

            return redirect()->route('admin.profile')->with('success', 'Avatar updated successfully!');
        }


}
