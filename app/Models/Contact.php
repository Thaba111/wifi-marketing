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
    protected $fillable = ['name', 'email', 'phone_number', 'location', 'segment_id'];

    public function segments()
    {
        return $this->hasMany(Segment::class);
    }

    public function contactSegments(): HasMany
    {
        return $this->hasMany(ContactSegment::class, 'contact_id');
    }

     // Required for importing
     public function model(array $row)
     {
         return new Contact([
             'name'        => $row['name'],
            'email'       => $row['email'],
            'phone_number' => $row['phone_number'],
            'location'    => $row['location'],
            'segment_id'  => $row['segment_id'],
         ]);
     }
 
     // Required for exporting
     public function headings(): array
     {
         return [
             'Name',
             'Email',
             'Phone Number',
             'Location',
             'Segment ID',
         ];
     }
}
