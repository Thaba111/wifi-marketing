<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone_number', 'location', 'segment_id'];

    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }
}
