<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\DetailPesanan;
use Illuminate\Routing\Controller;
use App\Models\Menu;

class PesananController extends Controller
{

    public function index()
{
    // Mendapatkan daftar pesanan
    $pesanans = Pesanan::all();

    // Mengirim data ke view (jika ada halaman untuk menampilkan daftar pesanan)
    $pesanans = Pesanan::with('detailPesanans')->get();  // Eager load detail_pesanans
    return view('pesanan.index', compact('pesanans'));
}
    
public function store(Request $request)
{
    $validatedData = $request->validate([
        'namaPelanggan' => 'required|string|max:255',
        'noMeja' => 'required|integer|min:1',
    ]);

    $pesanan = new Pesanan();
    $pesanan->namaPelanggan = $validatedData['namaPelanggan'];
    $pesanan->noMeja = $validatedData['noMeja'];
    $pesanan->User_idUser = 1; // Default ID User (bisa diambil dari session jika ada login)
    $pesanan->laporan_idlaporan = null; // Sesuaikan sesuai logika aplikasi Anda
    $pesanan->save();

    return response()->json(['message' => 'Pesanan berhasil disimpan!'], 201);
}
}
