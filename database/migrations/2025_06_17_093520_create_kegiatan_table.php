<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('pembicara');
            $table->date('tanggal');
            $table->string('waktu'); // Contoh: "09:00 - 10:30"
            $table->string('lokasi');
            $table->text('deskripsi_singkat');
            $table->string('gambar')->nullable(); // Path ke gambar modal
            $table->string('judul_modal');
            $table->text('deskripsi_panjang'); // Deskripsi di dalam modal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
