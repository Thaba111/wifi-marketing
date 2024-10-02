<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactSegment extends Model
{
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function segment(): BelongsTo
    {
        return $this->belongsTo(Segment::class);
    }

    protected $fillable = ['contact_id', 'segment_id'];
}
