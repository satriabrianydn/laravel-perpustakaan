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
        Schema::create('data_buku', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->string('nama_buku');
            $table->unsignedBigInteger('id_penerbit')->nullable();
            $table->foreign('id_penerbit')
                ->references('id')
                ->on('penerbit')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->foreign('id_kategori')
                ->references('id')
                ->on('kategori')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('tanggal_terbit');
            $table->string('jumlah_halaman');
            $table->string('nama_pengarang');
            $table->string('foto_buku')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_buku');
    }
};
