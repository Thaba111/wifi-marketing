<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutomationRule extends Model
{
    use HasFactory;
    
    protected $fillable = ['campaign_id', 'rule_criteria'];

    protected $casts = [
        'rule_criteria' => 'array', // Cast the JSON field to array
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

}
