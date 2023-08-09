<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

//    protected $table = "pemesanans";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }

    public static function generateTransactionCode()
    {
        $year = date('Y');
        $month = date('m');

        $lastRecord = self::latest()->first();
        if ($lastRecord) {
            $lastCode = $lastRecord->id;
            $lastYear = substr($lastCode, 4, 4);
            $lastMonth = substr($lastCode, 9, 2);

            $increment = $lastCode += 1;
        } else {
            $increment = 1;
        }

        $incrementFormatted = str_pad($increment, 4, '0', STR_PAD_LEFT);

        return "SI/JSC/{$year}/{$month}/{$incrementFormatted}";
    }
}
