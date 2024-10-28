<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaptivePortal;

class CaptivePortalController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:captive_portals,email',
            'terms' => 'required|accepted',
        ]);

        CaptivePortal::create($validated);

        return redirect()->back()->with('success', 'You are now connected to WiFi!');
    }
}

