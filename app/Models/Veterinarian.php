<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinarian extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function animals()
    {
        // Many-to-many relationship between Veterinarian and Animal.
        return $this->belongsToMany('App\Models\Animal', 'veterinarian_animal');
    }
}
