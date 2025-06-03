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
        Schema::create('kebutuhan', function (Blueprint $table) {
            $table->id('id_kebutuhan');
            $table->foreignId('id_panti')->constrained('panti')->onDelete('cascade');
            $table->string('tipe');
            $table->text('deskripsi');
            $table->string('urgency_level');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebutuhan');
    }
};
