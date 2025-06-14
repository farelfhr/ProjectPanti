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
            $table->string('social_media_url');
            $table->timestamp('created_at')->useCurrent();
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
