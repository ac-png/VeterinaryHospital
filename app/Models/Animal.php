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
        return $this->belongsTo(Hospital::class);
    }
    public function veterinarians()
    {
        return $this->belongsToMany('App\Models\Veterinarian', 'veterinarian_animal');
    }
}
