<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaptivePortal;

class CaptivePortalController extends Controller
{
    // For Mama's Sauce portal
    public function showBrewHeaven()
    {
        return view('captive-portal.brew-heaven.create');
    }
    
    public function showFlavorFusion()
    {
        return view('captive-portal.flavor-fusion.create');
    }
    
    public function showMamasSauce()
    {
        return view('captive-portal.mamas-sauce.create');
    }
    
    public function success()
    {
        return view('captive-portal.success');
    }

    public function store(Request $request)
    {
        // Validation code or any other processing
    
        return redirect()->route('captive-portal.success')->with('success', 'You are now connected to WiFi!');
    }

    // Redirects to success page when "Connect to WiFi" is clicked
    public function connect(Request $request)
    {
        // Additional logic can be added here if needed, such as logging
        return redirect()->route('captive-portal.success')->with('success', 'You are now connected to WiFi!');
    }
}

