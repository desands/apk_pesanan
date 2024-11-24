<?php

use App\Models\pesanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TampilanController;

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
    return view('welcome');
});

Route::get('/master', function () {
    return view('layouts.master');
})->middleware(['auth', 'verified'])->name('master');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});
// menu
Route::middleware('auth')->group(function(){
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
});

// tampilan
Route::get('/tampilan',[TampilanController::class, 'index'])->name('tampilan.index');
// Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');

// pesanan
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::post('/pesanans', [PesananController::class, 'store'])->name('pesanans.store');

// laporan













Route::get('/qrcode', [MenuController::class, 'qrcode'])->name('menu.qrcode');




Route::get('/menu/qr-code', [MenuController::class, 'showQrCode'])->name('menu.qr-code');




// Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
// Route::post('/pesanan', [PesananController::class, 'store'])->name('menu.pesanan');




// });

// Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
// Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');


Route::middleware('auth')->group(function () {
    
});

require __DIR__.'/auth.php';
