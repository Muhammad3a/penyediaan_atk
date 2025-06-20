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
        Schema::create('gimmicks', function (Blueprint $table) {
            $table->id();

            $table->date('tanggal')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('gambar')->nullable();
            $table->string('stok')->nullable();
            $table->string('stok2')->nullable();

            // Kolom harian: day_1 sampai day_30
            foreach (range(1, 31) as $i) {
                $table->integer('day_' . $i)->nullable();
            }

            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gimmicks');
    }
};
