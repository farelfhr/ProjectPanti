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
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('bookmarkable_type'); // App\Models\Panti atau App\Models\Artikel
            $table->unsignedBigInteger('bookmarkable_id');
            $table->timestamps();

            // Index untuk polymorphic relationship
            $table->index(['bookmarkable_type', 'bookmarkable_id']);
            
            // Unique constraint untuk mencegah duplicate bookmark
            $table->unique(['user_id', 'bookmarkable_type', 'bookmarkable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};
