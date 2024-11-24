<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
   
    protected $table = 'detail_pesanans';
    protected $primaryKey = 'id';

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'idMenu');
    }

    public function getTotalAttribute()
    {
        $menu = Menu::find($this->menu_id); // Ambil harga dari tabel menus
        return $this->jumlah * $menu->harga; // Menghitung total
    }
}


