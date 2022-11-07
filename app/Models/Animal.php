<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Where the url is the animal id, this changes it to the uuid.
    public function getRouteKeyName()
    {
        return 'uuid';  
    }
}
