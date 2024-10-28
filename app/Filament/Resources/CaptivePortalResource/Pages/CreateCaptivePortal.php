<?php

namespace App\Filament\Resources\CaptivePortalResource\Pages;

use App\Filament\Resources\CaptivePortalResource;
use App\Models\CaptivePortal;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Http\Request;

class CreateCaptivePortal extends CreateRecord
{
    protected static string $resource = CaptivePortalResource::class;

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:captive_portals',
            'consent' => 'accepted',
        ]);

        // Save the data to database
        CaptivePortal::create($validatedData);

        // Redirect to success or listing page
        return redirect()->route('filament.resources.captive-portal.index');
    }
}

