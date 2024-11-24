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
        Schema::create('menu_pesanans', function (Blueprint $table) {
            $table->foreignId('Menu_idMenu')->constrained('menus', 'idMenu')->onDelete('cascade');
            $table->foreignId('Pesanan_idPesanan')->constrained('pesanans', 'idPesanan')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('details_pesanan'); // Sesuai dengan nama tabel di 'up'
        Schema::dropIfExists('menu_pesanans');
    }
};
