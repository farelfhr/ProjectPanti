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
        Schema::table('kontak', function (Blueprint $table) {
            // Tambahkan kolom untuk menyimpan info pengirim tamu
            $table->string('nama_pengirim')->after('id_user');
            $table->string('email_pengirim')->after('nama_pengirim');
            $table->string('telepon_pengirim')->nullable()->after('email_pengirim');

            // Ubah kolom kategori agar lebih fleksibel
            $table->string('kategori')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kontak', function (Blueprint $table) {
            $table->dropColumn(['nama_pengirim', 'email_pengirim', 'telepon_pengirim']);
        });
    }
};
