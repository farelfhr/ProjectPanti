<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Panti;

class PaymentInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pantis = Panti::all();

        foreach ($pantis as $panti) {
            // Update dengan data pembayaran contoh
            $panti->update([
                'whatsapp_number' => '081234567890',
                'bank_name' => 'Bank Central Asia (BCA)',
                'bank_account' => '1234567890',
                // QR code akan diupload manual oleh admin
            ]);
        }
    }
}
