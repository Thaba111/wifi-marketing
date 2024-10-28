<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $casts = [
        'value' => 'array', // Automatically cast to an array
    ];
    protected $fillable = ['key','value'];
}