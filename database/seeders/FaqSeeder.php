<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {
        Faq::create([
            'question' => 'Apa itu Titik Kebaikan?',
            'answer' => 'Titik Kebaikan adalah sebuah platform digital yang bertujuan untuk menghubungkan masyarakat, komunitas, dan donatur dengan panti asuhan di Kota Malang. Kami menyediakan informasi terverifikasi, transparan, dan mudah diakses mengenai profil, kebutuhan, serta program-program panti asuhan. Dengan semangat kolaborasi dan kepedulian, Titik Kebaikan hadir untuk memudahkan setiap orang dalam menyalurkan bantuan, inspirasi, dan kebaikan secara tepat sasaran demi masa depan anak-anak yang lebih baik.'
        ]);
        Faq::create([
            'question' => 'Bagaimana cara mendaftar sebagai donatur?',
            'answer' => 'Untuk menjadi donatur di Titik Kebaikan, Anda cukup melakukan registrasi melalui menu pendaftaran di website kami. Setelah akun terverifikasi, Anda dapat memilih panti asuhan yang ingin didukung, melihat kebutuhan mereka secara real-time, dan menyalurkan bantuan baik berupa dana, barang, maupun program pendampingan. Setiap donasi yang Anda berikan akan dicatat secara transparan dan dapat dipantau perkembangannya melalui dashboard pribadi.'
        ]);
        Faq::create([
            'question' => 'Apakah data panti diverifikasi?',
            'answer' => 'Ya, seluruh data panti asuhan yang ditampilkan di Titik Kebaikan telah melalui proses verifikasi oleh tim kami. Kami memastikan setiap panti yang terdaftar adalah lembaga resmi, memiliki legalitas yang jelas, dan aktif menjalankan program sosial. Proses verifikasi ini dilakukan secara berkala untuk menjaga kepercayaan dan memastikan bantuan yang disalurkan benar-benar sampai kepada yang membutuhkan.'
        ]);
    }
} 