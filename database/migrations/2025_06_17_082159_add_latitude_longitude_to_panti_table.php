Benerin Admin <?php

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
            if (!Schema::hasColumn('panti', 'latitude')) {
                $table->string('latitude')->nullable()->after('alamat');
            }
            if (!Schema::hasColumn('panti', 'longitude')) {
                $table->string('longitude')->nullable()->after('latitude');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('panti', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
        });
    }
};
