<?php

namespace App\Http\Controllers;

use App\Models\Setting; 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SettingController extends Controller
{
    /**
     * Show the form for creating a new setting.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('settings.create'); 
    }

    /**
     * Store a newly created setting in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'key' => 'nullable|string|max:255|unique:settings,key',
            'value' => 'nullable|string',
        ]);

        // Create the setting
        $setting = Setting::create($validatedData);

        // Store the newly created setting in the session
        session(['new_setting' => [
            'key' => $setting->key,
            'value' => $setting->value,
        ]]);

        // Redirect to settings index with success message
        return redirect()->route('settings.index')->with('success', 'Setting added successfully.');
    }

    /**
     * Show the list of settings with additional details.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settings = Setting::all();
        return view('settings.index', compact('settings')); 
    }
}
