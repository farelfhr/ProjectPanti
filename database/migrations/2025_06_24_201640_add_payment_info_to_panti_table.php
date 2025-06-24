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
        Schema::table('panti', function (Blueprint $table) {
            $table->string('qr_code')->nullable()->after('deskripsi');
            $table->string('whatsapp_number')->nullable()->after('qr_code');
            $table->string('bank_account')->nullable()->after('whatsapp_number');
            $table->string('bank_name')->nullable()->after('bank_account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('panti', function (Blueprint $table) {
            $table->dropColumn(['qr_code', 'whatsapp_number', 'bank_account', 'bank_name']);
        });
    }
};
