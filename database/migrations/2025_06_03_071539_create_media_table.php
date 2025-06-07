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
        Schema::create('media', function (Blueprint $table) {
            $table->id('id_media');
            $table->foreignId('id_panti')->constrained('panti', 'id_panti')->onDelete('cascade');
            $table->foreignId('id_artikel')->constrained('artikel', 'id_artikel')->onDelete('cascade');
            $table->unsignedBigInteger('id_story')->nullable();
            $table->string('url');
            $table->enum('type', ['gambar', 'video']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
