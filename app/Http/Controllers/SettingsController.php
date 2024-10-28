<?php

namespace App\Http\Controllers;

use App\Models\Setting; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        // Debug the incoming request data
        Log::info($request->all());
    
        $request->validate([
            'key' => 'required|string|unique:settings,key',
            'value' => 'required|string',
        ]);
    
        // Ensure 'value' is a string
        $value = is_array($request->value) ? json_encode($request->value) : $request->value;
    
        Setting::create([
            'key' => $request->key,
            'value' => $value,
        ]);
    
        return redirect()->route('settings.index')->with('success', 'Setting created successfully.');
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
