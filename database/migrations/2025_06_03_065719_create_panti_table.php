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
        Schema::create('panti', function (Blueprint $table) {
            $table->id('id_panti');
            $table->string('nama');
            $table->string('alamat');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('social_media_url')->nullable();
            $table->string('gambar')->nullable();
            $table->string('kecamatan');
            $table->integer('jumlah_anak')->default(0);
            $table->integer('kapasitas')->default(0);
            $table->year('tahun_berdiri')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panti');
    }
};
