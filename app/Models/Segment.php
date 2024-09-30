<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'criteria'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
