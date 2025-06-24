<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judulList = [
            'Pentingnya Pendidikan Karakter Sejak Dini',
            'Tips Menjaga Kesehatan Anak di Panti Asuhan',
            'Peran Donatur dalam Meningkatkan Kesejahteraan Anak',
            'Kegiatan Kreatif untuk Anak-Anak Panti',
            'Mengajarkan Nilai Gotong Royong pada Anak',
            'Mengenal Lebih Dekat Panti Asuhan Muhammadiyah',
            'Cara Efektif Mendukung Pendidikan Anak Yatim',
            'Kisah Inspiratif Anak Panti Berprestasi',
            'Manfaat Donasi Rutin untuk Panti Asuhan',
            'Membangun Masa Depan Cerah Bersama Panti',
        ];
        $kontenList = [
            'Pendidikan karakter sangat penting untuk membentuk kepribadian anak sejak dini. Melalui pendidikan karakter, anak-anak belajar tentang kejujuran, tanggung jawab, dan empati yang akan membekali mereka di masa depan.',
            'Menjaga kesehatan anak di panti asuhan dapat dilakukan dengan pola makan seimbang, olahraga teratur, dan menjaga kebersihan lingkungan. Peran pengasuh sangat penting dalam membiasakan pola hidup sehat.',
            'Donatur memiliki peran besar dalam membantu kebutuhan sehari-hari anak panti. Dukungan donatur tidak hanya berupa materi, tetapi juga motivasi dan perhatian yang dapat meningkatkan semangat anak-anak.',
            'Kegiatan kreatif seperti melukis, menari, dan membuat kerajinan tangan dapat membantu anak-anak mengekspresikan diri dan mengembangkan bakat mereka. Kegiatan ini juga mempererat hubungan antar anak.',
            'Nilai gotong royong dapat diajarkan melalui kegiatan bersama seperti membersihkan lingkungan, memasak, atau belajar kelompok. Anak-anak akan belajar pentingnya kerja sama dan saling membantu.',
            'Panti Asuhan Muhammadiyah telah berdiri sejak puluhan tahun dan berkomitmen memberikan pendidikan serta pengasuhan terbaik bagi anak-anak yatim dan dhuafa.',
            'Dukungan pendidikan untuk anak yatim dapat diberikan melalui donasi buku, alat tulis, atau beasiswa. Setiap bantuan sangat berarti untuk masa depan mereka.',
            'Banyak anak panti yang berhasil meraih prestasi di bidang akademik maupun non-akademik. Kisah mereka menjadi inspirasi bagi anak-anak lain untuk terus berusaha dan tidak mudah menyerah.',
            'Donasi rutin sangat membantu panti asuhan dalam memenuhi kebutuhan harian seperti makanan, pendidikan, dan kesehatan anak-anak.',
            'Bersama panti asuhan, kita dapat membangun masa depan cerah bagi anak-anak yang membutuhkan. Setiap kontribusi, sekecil apapun, sangat berarti.',
        ];
        $gambar = [
            'artikel/1.jpg',
            'artikel/2.jpg',
            'artikel/3.jpg',
            'artikel/4.jpg',
            'artikel/5.jpg',
            'artikel/6.webp',
            'artikel/7.jpg',
            'artikel/berita-populer-1.jpg',
            'artikel/berita-populer-2.jpg',
            'artikel/berita-terkini.jpg',
            'artikel/panti-asuhan.jpg',
        ];
        $idx = fake()->numberBetween(0, count($judulList) - 1);
        return [
            'judul' => $judulList[$idx],
            'konten' => $kontenList[$idx],
            'gambar' => fake()->randomElement($gambar),
            'publish_date' => now(),
            'id_penulis' => User::factory(),
            'id_kategori' => Kategori::factory(),
        ];
    }
}
