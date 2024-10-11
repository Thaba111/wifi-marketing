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

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }

}
