<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function animals()
    {
        // One-to-many relationship between Hospital and Animal.
        return $this->hasMany(Animal::class);
    }
}
