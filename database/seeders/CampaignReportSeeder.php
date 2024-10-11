<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\CampaignReport;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CampaignReportSeeder extends Seeder
{
    public function run()
    {
        // Ensure there are campaigns in the database
        $campaign = Campaign::firstOrCreate(['title' => 'Sample Campaign']);

        // Create sample data for campaign reports
        CampaignReport::create([
            'campaign_id'  => $campaign->id,
            'clicks'       => 5,
            'opens'        => 20,
            'conversions'  => 3,
            'report_date'  => Carbon::now()->subDays(5), // 5 days ago
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);

        CampaignReport::create([
            'campaign_id'  => $campaign->id,
            'clicks'       => 15,
            'opens'        => 30,
            'conversions'  => 8,
            'report_date'  => Carbon::now()->subDays(3), // 3 days ago
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);

        CampaignReport::create([
            'campaign_id'  => $campaign->id,
            'clicks'       => 50,
            'opens'        => 100,
            'conversions'  => 15,
            'report_date'  => Carbon::now()->subDays(1), // 1 day ago
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
    }
}
