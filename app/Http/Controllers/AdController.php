<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    // Show all ads
    public function index()
    {
        $ads = Ad::all();
        return view('ads.index', compact('ads'));
    }

    // Show form to create a new ad
    public function create()
    {
        // Define available schedules for the dropdown
        $schedules = [
            'once' => 'Once',
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
        ];

        return view('ads.create', compact('schedules'));
    }

    // Store a new ad in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'schedule' => 'required|string',  // Now a string, as the dropdown will return string values
            'target_audience' => 'required|json',  // Ensures it is a valid JSON string
        ]);

        // Create a new ad entry in the database
        $ad = Ad::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'schedule' => $request->input('schedule'),
            'target_audience' => $request->input('target_audience'),
        ]);

        return redirect()->route('ads.index')->with('success', 'Ad created successfully!');
    }

    // Show a specific ad
    public function show(Ad $ad)
    {
        return view('ads.show', compact('ad'));
    }

    // Show form to edit an ad
    public function edit(Ad $ad)
    {
        // Define available schedules for the dropdown
        $schedules = [
            'once' => 'Once',
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
        ];

        return view('ads.edit', compact('ad', 'schedules'));
    }

    // Update an existing ad in the database
    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'schedule' => 'required|string',  // Updated validation for schedule (string from dropdown)
            'target_audience' => 'required|json',
        ]);

        // Update the ad
        $ad->update($request->all());

        return redirect()->route('ads.index')->with('success', 'Ad updated successfully!');
    }

    // Delete an ad
    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->route('ads.index')->with('success', 'Ad deleted successfully!');
    }

    public function trackCampaignPerformance($campaign_id, $clicks, $opens, $conversions)
    {
        $report = new CampaignReport();
        $report->campaign_id = $campaign_id;
        $report->clicks = $clicks;
        $report->opens = $opens;
        $report->conversions = $conversions;
        $report->report_date = now()->toDateString(); // Use the current date
        $report->save();
    
        return response()->json(['message' => 'Campaign performance tracked successfully!']);
    }

    public function campaignReports($campaign_id)
{
    $reports = CampaignReport::where('campaign_id', $campaign_id)->get();
    return view('campaigns.reports', compact('reports'));
}

    

}
