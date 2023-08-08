<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Sesi;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venue.detailvenue', [
            'venues' => Venue::find(1)
        ]);
    }

    public function showPesan(Venue $venue)
    {

        $sesi = $venue->prices()->with('sesi')->getRelation('sesi')->where('status', 'tersedia')->get();

        $pemesanan = Pemesanan::where("venue_id", $venue->id)->get();
        return view('venue.pesanvenue', [
            'sesi' => $sesi,
            'pemesanan' => $pemesanan,
            'venue' => $venue,
        ]);
    }

    public function pesan(Request $request, Venue $venue)
    {

        $request->validate([
            'sesi' => 'required',
        ]);

        $year = date('Y');
        $month = date('m');

        $lastRecord = Pemesanan::latest()->first();
        if ($lastRecord) {
            $lastCode = $lastRecord->id;
            $lastYear = substr($lastCode, 4, 4);
            $lastMonth = substr($lastCode, 9, 2);

            $increment = $lastCode += 1;

        } else {
            $increment = 1;
        }

        $incrementFormatted = str_pad($increment, 4, '0', STR_PAD_LEFT);

        $code = "SI/JSC/{$year}/{$month}/{$incrementFormatted}";

        Pemesanan::create([
            "user_id" => Auth::user()->id,
            "venue_id" => $venue->id,
            "sesi_id" => $request->sesi,
            "kode_transaksi" => $code,
        ]);
        Sesi::find($request->sesi)->update([
            "status" => "dipesan",
        ]);
        return redirect()->route('pesanan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        //
    }
}
