<?php

namespace App\Services;

use App\Models\Campaign;
use App\Models\CampaignReport;

class CampaignReportService
{
    public static function generateReportForCampaign(Campaign $campaign)
    {
        // Logic to generate report using actual data
        $report = CampaignReport::create([
            'campaign_id' => $campaign->id,
            'clicks' => rand(0, 100), // Replace with actual clicks data
            'opens' => rand(0, 100),  // Replace with actual opens data
            'conversions' => rand(0, 50), // Replace with actual conversions data
            'report_date' => now(),
        ]);

        return $report;
    }
}
