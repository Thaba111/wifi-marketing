<?php

namespace App\Http\Controllers;
use App\Models\CampaignReport;
use App\Models\AdImpression;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function getCampaignReport($id) {
        $report = CampaignReport::where('campaign_id', $id)->get();
        return response()->json($report);
    }
    
    public function getAdImpressions($id) {
        $impressions = AdImpression::where('campaign_id', $id)->get();
        return response()->json($impressions);
    }
    
}
