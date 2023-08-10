<?php

use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\VenueController;
use App\Models\Venue;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', function () {
    return view('home', [
        'venues' => Venue::all()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/venue/kelola-venue', [VenueController::class, 'kelolaVenue'])->name('venue.kelola-venue');
Route::get('/venue/harga/{venue}', [VenueController::class, 'harga'])->name('venue.harga');
Route::get("/admin", [PemesananController::class, 'admin'])->name('admin.index');
Route::get("/admin/download-laporan", [PemesananController::class, 'download'])->name('admin.download-laporan');

Route::get('/sesi/{price}/tambah-sesi', [VenueController::class, 'tambahSesi'])->name('sesi.tambah-sesi');
Route::post('/sesi/{price}/tambah-sesi', [VenueController::class, 'storeSesi'])->name('sesi.store-sesi');
Route::post('/harga/{venue}/tambah', [VenueController::class, 'tambahHarga'])->name('harga.tambah');


Route::get('venue/{venue}', [VenueController::class, 'show'])->name('venue.show');
Route::get('venues/{venue}/pesan', [VenueController::class, 'showPesan'])->name('venues.showPesan');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('venue', VenueController::class)->except(['show']);
    Route::resource('transaksi', TransaksiController::class);
    Route::get('pesanlapangan', function () {
        return view('pesanlapangan.pesanlapngan');
    });


    Route::post('venues/{venue}/pesan', [VenueController::class, 'pesan'])->name('venues.pesan')->middleware('is_completed');
    Route::resource('pesanan', PemesananController::class);
    Route::post("pesanan/{pesanan}/bayar", [PemesananController::class, 'bayar'])->name('pesanan.bayar');
});

require __DIR__ . '/auth.php';
