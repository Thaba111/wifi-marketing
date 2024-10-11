<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CampaignReport;


class CampaignReportController extends Controller
{
    public function index(Request $request)
    {
        $reports = CampaignReport::with('campaign') // eager load related campaigns
            ->orderBy('report_date', 'desc')
            ->paginate(10); // Adjust pagination as needed

        return view('campaign_reports.index', compact('reports'));
    }
    public function show($id)
    {
        $report = CampaignReport::with('campaign')->findOrFail($id);

        return view('campaign_reports.show', compact('report'));
    }
}
