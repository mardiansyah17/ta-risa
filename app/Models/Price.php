<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
protected $guarded = ['id'];
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function sesi()
    {
        return $this->hasMany(Sesi::class);

    }
}
