<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id('id');
            $table->string('namaPelanggan', 255);
            $table->string('namaMenu', 255);
            // $table->integer('noMeja');
            $table->integer('tanggal');
            $table->integer('jumlahMenu');
            $table->integer('total');
            $table->foreignId('id_pesanan')->constrained('pesanans', 'idPesanan')->onDelete('cascade');
            $table->foreignId('idMenu')->constrained('menus', 'idMenu')->onDelete('cascade');
            // $table->integer('totalHarga');
            
            $table->timestamps();
        });
       
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_pesanans');
    }
};
