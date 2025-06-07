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
        Schema::create('artikel', function (Blueprint $table) {
            $table->id('id_artikel');
            $table->string('judul');
            $table->text('konten');
            $table->date('publish_date');
            $table->foreignId('id_penulis')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('id_kategori')->constrained('kategori', 'id_kategori')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
