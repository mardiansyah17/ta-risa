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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('venue', VenueController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::get('pesanlapangan', function () {
        return view('pesanlapangan.pesanlapngan');
    });

    Route::get('venues/{venue}', [VenueController::class, 'index'])->name('venues.detail');
    Route::get('venues/{venue}/pesan', [VenueController::class, 'showPesan'])->name('venues.showPesan');
    Route::post('venues/{venue}/pesan', [VenueController::class, 'pesan'])->name('venues.pesan');
    Route::resource('pesanan', PemesananController::class);
    Route::post("pesanan/{pesanan}/bayar", [PemesananController::class, 'bayar'])->name('pesanan.bayar');

    Route::get("/admin", [PemesananController::class, 'admin'])->name('admin.index');
});

require __DIR__ . '/auth.php';
