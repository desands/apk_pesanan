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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('idPesanan');
    $table->string('namaPelanggan', 255);
    $table->timestamp('tanggal')->useCurrent();
    $table->integer('noMeja');
    $table->foreignId('User_idUser')->nullable()->constrained('users')->onDelete('cascade');
    $table->unsignedBigInteger('laporan_idlaporan')->nullable();
    $table->foreign('laporan_idlaporan')->references('idlaporan')->on('laporans')->onDelete('cascade');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
