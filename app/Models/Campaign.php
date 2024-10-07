<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'type', 'status', 'content', 'sent_at'];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'campaign_contacts');
    }

    public function automationRules()
    {
        return $this->hasMany(AutomationRule::class);
    }
}
