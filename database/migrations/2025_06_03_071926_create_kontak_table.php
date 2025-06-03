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
        Schema::create('kontak', function (Blueprint $table) {
            $table->id('id_kontak');
            $table->foreignId('id_user')->nullable()->constrained('users')->onDelete('set null');
            $table->string('subjek');
            $table->text('konten');
            $table->enum('kategori', ['kritik', 'saran', 'lainnya']);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak');
    }
};
