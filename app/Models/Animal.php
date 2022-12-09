<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function hospital()
    {
        // One-to-many relationship between Hospital and Animal.
        return $this->belongsTo(Hospital::class);
    }
    public function veterinarians()
    {
        // Many-to-many relationship between Veterinarian and Animal.
        return $this->belongsToMany('App\Models\Veterinarian', 'veterinarian_animal');
    }
}
