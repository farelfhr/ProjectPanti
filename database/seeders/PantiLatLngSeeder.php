<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Panti; // Import model Panti

class PantiLatLngSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pantiData = [
            [
                "nama" => "Panti Asuhan Muhammadiyah Malang (PAMMA)",
                "latitude" => "-7.986877",
                "longitude" => "112.622521"
            ],
            [
                "nama" => "Panti Asuhan Ar Rohman",
                "latitude" => "-7.978567",
                "longitude" => "112.628886"
            ],
            [
                "nama" => "Panti Asuhan Yasibu 2 (Suhat)",
                "latitude" => "-7.942721",
                "longitude" => "112.620023"
            ],
            [
                "nama" => "Panti Asuhan Putri 'Aisyiyah Malang",
                "latitude" => "-7.954700",
                "longitude" => "112.602700"
            ],
            [
                "nama" => "Panti Asuhan Sunan Kalijogo",
                "latitude" => "-7.910375",
                "longitude" => "112.601550"
            ],
            [, 
                "nama" => "Pondok Anak Yatim (PAY) Salman",
                "latitude" => "-7.957250",
                "longitude" => "112.601800"
            ],
            [
                "nama" => "Panti Asuhan St. Theresia",
                "latitude" => "-8.000325",
                "longitude" => "112.617936"
            ],
            [
                "nama" => "Panti Asuhan Darul Jundi",
                "latitude" => "-7.962473",
                "longitude" => "112.632788"
            ],
            [
                "nama" => "Panti Asuhan Blimbing Malang (Mizan Amanah)",
                "latitude" => "-7.973900",
                "longitude" => "112.650800"
            ], 
            [
                "nama" => "Panti Asuhan Yasibu 1",
                "latitude" => "-8.026400",
                "longitude" => "112.646900"
            ],
            [
                "nama" => "Yayasan Nurul Izzah Malang",
                "latitude" => "-7.994270",
                "longitude" => "112.666990"
            ],
            [
                "nama" => "Panti Asuhan Mabarot Sunan Giri",
                "latitude" => "-7.997235",
                "longitude" => "112.632975"
            ],
        ];

        foreach ($pantiData as $data) {
            Panti::where('nama', $data['nama'])->update([
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
            ]);
        }
    }
}
