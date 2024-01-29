<?php

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
    return view('home',[
        'beasiswas' => \App\Models\Beasiswa::all(),
    ]);
})->name('home');

// route pendaftar
Route::prefix('daftar')->group(function () {
    Route::get('/', [\App\Http\Controllers\PendaftarController::class, 'index'])->name('daftar');
    Route::post('/save', [\App\Http\Controllers\PendaftarController::class, 'store'])->name('daftar.store');
});

// route hasil
Route::get('/hasil', [\App\Http\Controllers\HasilController::class, 'index'])->name('hasil');
// route download berkas
Route::get('/hasil/download/{id}', [\App\Http\Controllers\HasilController::class, 'download'])->name('hasil.download');

// route grafik
Route::get('/grafik', function() {
    // hitung jumlah pendaftar per beasiswa
    $beasiswas = \App\Models\Beasiswa::all();
    $data = [];
    foreach ($beasiswas as $beasiswa) {
        $data[] = [
            'name' => $beasiswa->name,
            'y' => $beasiswa->pendaftar->count(),
        ];
    }

    // konversi data ke json
    $chartData = json_encode($data);

    // kembalikan view grafik
    return view('grafik', [
        'chartData' => $chartData,
    ]);
})->name('grafik');