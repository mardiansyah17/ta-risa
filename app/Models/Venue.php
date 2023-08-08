<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function sesi()
    {
        return $this->hasMany(Sesi::class);
    }
}
