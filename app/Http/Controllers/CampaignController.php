<?php

namespace App\Http\Controllers;
use App\Services\CampaignReportService;
use App\Models\Campaign;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function sendCampaign($campaignId)
    {
        $campaign = Campaign::find($campaignId);

        // Trigger report generation automatically after sending campaign
        CampaignReportService::generateReportForCampaign($campaign);

        return response()->json(['message' => 'Campaign sent and report generated']);
    }
}
