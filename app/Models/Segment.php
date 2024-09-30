<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'criteria', 'contact_id'];

    public function contacts()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
}
