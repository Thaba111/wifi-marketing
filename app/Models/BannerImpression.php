<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerImpression extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_id',
        'impressions',
        'clicks',
    ];

    // Relationship with Banner
    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }
    public function trackBannerImpressions($banner_id, $impressions, $clicks)
{
    $banner_impression = new BannerImpression();
    $banner_impression->banner_id = $banner_id;
    $banner_impression->impressions = $impressions;
    $banner_impression->clicks = $clicks;
    $banner_impression->save();

    return response()->json(['message' => 'Banner performance tracked successfully!']);
}

}
