<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanans = Pemesanan::with(['user', 'venue', 'sesi'])->where('user_id', auth()->user()->id)->get();
        return view('pesanan.tampilkan-pesanan', [
            'pesanans' => $pesanans,
        ]);
    }

    public function bayar(Pemesanan $pesanan, Request $request)
    {

        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $buktiBayar = $request->file('bukti_bayar')->store("bukti_bayar");
        $pesanan->update([
            'status' => 'sudah bayar',
            'bukti_pembayaran' => $buktiBayar,
        ]);
        return redirect()->back()->with('success', 'Pembayaran Berhasil');
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
     * @param \App\Models\Pemesanan $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pesanan)
    {
        return view("pesanan.detail-pesanan", [
            'pemesanan' => $pesanan,
        ]);
    }

    public function admin()
    {
        return view('admin.index', [
            'pesanans' => Pemesanan::with(['user', 'venue', 'sesi'])->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Pemesanan $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pemesanan $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Pemesanan $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
