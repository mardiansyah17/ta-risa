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
        $prefix = 'SI/JSC/';
        $year = now()->format('Y');
        $month = now()->format('m');
        $lastTransaction = self::latest()->first();
        if ($lastTransaction) {
            $lastCode = $lastTransaction->kode_transaksi;
            $lastIncrement = intval(substr($lastCode, -3));
            $newIncrement = str_pad($lastIncrement + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newIncrement = '001';
        }

        return $prefix . $year . '/' . $month . '/' . $newIncrement;
    }
}
