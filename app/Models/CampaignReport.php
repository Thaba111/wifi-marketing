<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id',
        'clicks',
        'opens',
        'conversions',
        'report_date',
    ];

    // Relationship with Campaign
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
