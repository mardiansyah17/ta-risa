<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Price;
use App\Models\Sesi;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

        $prices = Price::with('sesi')->where('venue_id', $venue->id)->get();

        $allSesi = collect();
        foreach ($prices as $price) {
            $allSesi = $allSesi->merge($price->sesi->where('status', 'tersedia'));
        }
        $pemesanan = Pemesanan::where("venue_id", $venue->id)->get();
        return view('venue.pesanvenue', [
            'sesi' => $allSesi,
            'pemesanan' => $pemesanan,
            'venue' => $venue,
        ]);
    }

    public function harga(Venue $venue)
    {
        $prices = Price::with("sesi")->where("venue_id", $venue->id)->get();
        //        dd($sesi);
        return view("venue.harga", [
            "venue" => $venue,
            "prices" => $prices
        ]);
    }

    public function pesan(Request $request, Venue $venue)
    {

        $validator = Validator::make($request->all(), [
            'sesi' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Pastikan anda sudah memilih sesi');
        }
        if (Sesi::find($request->sesi)->status != "tersedia") {
            return redirect()->back()->with('error', 'Sesi sudah di pesan');
        }

        Pemesanan::create([
            "user_id" => Auth::user()->id,
            "venue_id" => $venue->id,
            "sesi_id" => $request->sesi,
            "kode_transaksi" => Pemesanan::generateTransactionCode()
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
        return view('venue.tambahvenue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            "image" => 'required|image|mimes:jpg,png,jpeg',
            "type" => 'required',
            "kapasistas" => 'required',
            "nohp" => 'required',
        ]);

        $image = $request->file('image')->store("venue");
        Venue::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $image,
            "type" => $request->type,
            "kapasistas" => $request->kapasistas,
            "nohp" => $request->nohp,
        ]);
        return redirect()->route('venue.kelola-venue')->with('success', 'Venue Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        return view('venue.detailvenue', [
            'venues' => $venue
        ]);
    }

    public function kelolaVenue()
    {
        return view('venue.kelolavenue', [
            'venues' => Venue::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        return view('venue.editvenue', [
            'venue' => $venue
        ]);
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            "type" => 'required',
            "kapasistas" => 'required',
            "nohp" => 'required',
        ]);

        $venue->update([
            "title" => $request->title,
            "description" => $request->description,
            //            "image" => $image,
            "type" => $request->type,
            "kapasistas" => $request->kapasistas,
            "nohp" => $request->nohp,
        ]);
        return redirect()->route('venue.kelola-venue')->with('success', 'Venue Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();
        return redirect()->route('venue.kelola-venue')->with('success', 'Venue Berhasil Ditambahkan');
    }

    public function tambahSesi(Price $price)
    {
        return view('venue.tambahHarga', [
            'price' => $price
        ]);
    }

    public function storeSesi(Price $price, Request $request)
    {
        $existingSession = $price->sesi()->where('tanggal', $request->tanggal)->first();
        if ($existingSession) {
            // Tanggal sudah ada di database, periksa juga jam_mulai dan jam_selesai
            if ($existingSession->jam_mulai == $request->jam_mulai && $existingSession->jam_selesai == $request->jam_selesai) {
                return redirect()->back()->with('error', 'Sesi Sudah Ada');
            }
        }
        $price->sesi()->create([
            "tanggal" => $request->tanggal,
            "jam_mulai" => $request->jam_mulai,
            "jam_selesai" => $request->jam_selesai,
        ]);
        return redirect()->route('venue.harga', $price->venue_id)->with('success', 'Sesi Berhasil Ditambahkan');
    }

    public function tambahHarga(Venue $venue, Request $request)
    {
        $request->validate([
            'price' => 'required'
        ]);
        $checkHarga = $venue->prices()->where("price", $request->price)->get()->count();
        if ($checkHarga > 0) {
            return redirect()->back()->with("message", "Harga sudah ada");
        }
        $venue->prices()->create([
            "price" => $request->price,
        ]);
        return redirect()->back();
    }
}
