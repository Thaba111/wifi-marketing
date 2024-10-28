<?php

namespace App\Http\Controllers;

use App\Models\Setting; 
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
{
    $settings = Setting::all()->map(function ($setting) {
        // Unserialize the string back into an array
        $setting->value = unserialize($setting->value);
        return $setting;
    });

    return view('settings.index', compact('settings'));
}
    public function create()
    {
        return view('settings.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'key' => 'required|string|max:255|unique:settings,key',
        'value' => 'required|array', // Validate that value is an array
    ]);

    // Serialize the array of values into a string
    $validatedData['value'] = serialize($validatedData['value']);

    Setting::create($validatedData);
    return redirect()->route('settings.index')->with('success', 'Setting added successfully.');
}
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $validatedData = $request->validate([
            'key' => 'required|string|max:255|unique:settings,key,' . $setting->id,
            'value' => 'required|string',
        ]);

        $setting->update($validatedData);
        return redirect()->route('settings.index')->with('success', 'Setting updated successfully.');
    }

    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully.');
    }
}
