<?php

namespace App\Http\Controllers;

use App\Models\BannerImpression;
use Illuminate\Http\Request;

class BannerImpressionController extends Controller
{
    public function recordClick($bannerId)
    {
        // Find the banner impression or create a new one
        $bannerImpression = BannerImpression::firstOrNew(['banner_id' => $bannerId]);

        // Increment the clicks
        $bannerImpression->clicks += 1; 
        $bannerImpression->impressions += 1; 
        $bannerImpression->save(); 

        return response()->json(['success' => true]);
    }
}
