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
        Schema::create('menus', function (Blueprint $table) {
            $table->id('idMenu');
            $table->string('image')->nullable();
            $table->string('namaMenu', 50);
            $table->decimal('harga', 10, 2); // Menggunakan decimal untuk harga
            $table->boolean('status'); // Menggunakan boolean untuk status
            // $table->integer('jumlahMakanan')->nullable();
            // $table->unsignedBigInteger('mejaid'); // Asumsikan mejaid adalah unsigned big integer
            $table->unsignedBigInteger('KasiridKasir'); // Asumsikan ini juga unsigned big integer
            $table->foreignId('User_idUser')->constrained('users', 'id')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
