<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image_url', 'target_url', 'page_location'];
    public function impressions()
    {
        return $this->hasMany(BannerImpression::class);
    }

}
