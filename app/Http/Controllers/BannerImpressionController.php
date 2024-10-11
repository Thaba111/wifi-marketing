<?php

namespace App\Http\Controllers;

use App\Models\BannerImpression;

class BannerImpressionController extends Controller
{
    public function index()
    {
        // Fetch all banner impressions
        $bannerImpressions = BannerImpression::with('banner')->get();

        // Return view with data
        return view('banner_impressions.index', compact('bannerImpressions'));
    }
}
