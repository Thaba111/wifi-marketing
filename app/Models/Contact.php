<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadings;


class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone_number', 'location'];

    public function segments()
    {
        return $this->hasMany(Segment::class);
    }

    public function contactSegments(): HasMany
    {
        return $this->hasMany(ContactSegment::class, 'contact_id');
    }
}
