<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\DetailPesanan;

class Pesanan extends Model
{
    // protected $primaryKey = 'idPesanan';
    // protected $fillable = [
    //     'namaPelanggan',
    //     'namaMenu',
    //     'jumlah',
    //     'noMeja',
    //     // 'User_idUser',
    //     'laporan_idlaporan'
    // ];
    use HasFactory;

    protected $primaryKey = 'idPesanan';

    protected $fillable = [
        'namaPelanggan',
        'noMeja',
        'User_idUser',
        'laporan_idlaporan',
    ];
}
