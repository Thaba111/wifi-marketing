<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'name'        => $row['name'],
            'email'       => $row['email'],
            'phone_number' => $row['phone_number'],
            'location'    => $row['location'],
            // 'segment_id'  => $row['segment_id'],
        ]);
    }
}
