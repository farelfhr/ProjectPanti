<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Panti;

class PantiSeeder extends Seeder
{
    public function run()
    {
        $panti = [
            [
                'nama' => 'Panti Asuhan Muhammadiyah Malang (PAMMA)',
                'alamat' => 'Bareng Tenes IV-A/637 Kelurahan Bareng, Kec. Klojen, Kota Malang',
                'phone' => '0341-365453',
                'email' => 'pamma@example.com',
                'social_media_url' => 'https://www.google.com/search?q=Panti+Asuhan+Muhammadiyah+Malang',
                'kecamatan' => 'Klojen',
                'jumlah_anak' => 50,
                'kapasitas' => 100,
                'tahun_berdiri' => 1990,
                'deskripsi' => 'Panti Asuhan Muhammadiyah Malang (PAMMA) adalah lembaga sosial yang menaungi anak-anak yatim dan dhuafa di Kota Malang. Berdiri sejak tahun 1990, PAMMA telah membantu ratusan anak untuk mendapatkan pendidikan dan kehidupan yang layak.'
            ],
            [
                'nama' => 'Panti Asuhan Yatim Putri Aisyiyah',
                'alamat' => 'Jl. Bandung No. 1, Kec. Lowokwaru, Kota Malang',
                'phone' => '0341-123456',
                'email' => 'aisyiyah@example.com',
                'social_media_url' => 'https://www.google.com/search?q=Panti+Asuhan+Yatim+Putri+Aisyiyah',
                'kecamatan' => 'Lowokwaru',
                'jumlah_anak' => 30,
                'kapasitas' => 50,
                'tahun_berdiri' => 1995,
                'deskripsi' => 'Panti Asuhan Yatim Putri Aisyiyah adalah lembaga yang khusus menaungi anak-anak yatim perempuan. Berdiri sejak tahun 1995, panti ini telah membantu banyak anak perempuan untuk mendapatkan pendidikan dan keterampilan hidup.'
            ],
            [
                'nama' => 'Panti Asuhan Al-Hidayah',
                'alamat' => 'Jl. Sukun Raya No. 45, Kec. Sukun, Kota Malang',
                'phone' => '0341-789012',
                'email' => 'alhidayah@example.com',
                'social_media_url' => 'https://www.google.com/search?q=Panti+Asuhan+Al-Hidayah',
                'kecamatan' => 'Sukun',
                'jumlah_anak' => 40,
                'kapasitas' => 75,
                'tahun_berdiri' => 2000,
                'deskripsi' => 'Panti Asuhan Al-Hidayah adalah lembaga yang menaungi anak-anak yatim dan dhuafa dengan fokus pada pendidikan agama dan akademik. Berdiri sejak tahun 2000, panti ini telah membantu banyak anak untuk mendapatkan pendidikan yang berkualitas.'
            ],
            [
                'nama' => 'Panti Asuhan Nurul Iman',
                'alamat' => 'Jl. Blimbing Raya No. 23, Kec. Blimbing, Kota Malang',
                'phone' => '0341-345678',
                'email' => 'nuruliman@example.com',
                'social_media_url' => 'https://www.google.com/search?q=Panti+Asuhan+Nurul+Iman',
                'kecamatan' => 'Blimbing',
                'jumlah_anak' => 35,
                'kapasitas' => 60,
                'tahun_berdiri' => 2005,
                'deskripsi' => 'Panti Asuhan Nurul Iman adalah lembaga yang menaungi anak-anak yatim dan dhuafa dengan fokus pada pendidikan karakter dan keterampilan. Berdiri sejak tahun 2005, panti ini telah membantu banyak anak untuk mengembangkan potensi mereka.'
            ],
            [
                'nama' => 'Panti Asuhan Al-Ikhlas',
                'alamat' => 'Jl. Kedungkandang No. 78, Kec. Kedungkandang, Kota Malang',
                'phone' => '0341-901234',
                'email' => 'alikhlas@example.com',
                'social_media_url' => 'https://www.google.com/search?q=Panti+Asuhan+Al-Ikhlas',
                'kecamatan' => 'Kedungkandang',
                'jumlah_anak' => 45,
                'kapasitas' => 80,
                'tahun_berdiri' => 2010,
                'deskripsi' => 'Panti Asuhan Al-Ikhlas adalah lembaga yang menaungi anak-anak yatim dan dhuafa dengan fokus pada pendidikan formal dan non-formal. Berdiri sejak tahun 2010, panti ini telah membantu banyak anak untuk meraih masa depan yang lebih baik.'
            ]
        ];

        foreach ($panti as $p) {
            Panti::create($p);
        }
    }
} 