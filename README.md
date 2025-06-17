# Project Panti

Titik Kebaikan : Sistem Informasi Panti Asuhan di Kota Malang Berbasis Web guna Mempermudah Akses Informasi dalam Berbuat Kebaikan

## Deskripsi

Titik Kebaikan adalah aplikasi web yang dirancang untuk membantu pengelolaan panti asuhan secara digital. website ini dirancang berdasarkan urgensi yang terjadi yaitu di kota Malang banyak sekali komunitas yang ingin menyalurkan kebaikan kepada panti asuhan yang ada, namun di kota Malang belum ada sistem informasi yang mengubungkan seluruh data panti yang ada sehingga individu/komunitas kesulitan untuk menjangkau informasi tentang panti asuhan di sekitarnya. Oleh karena itu Titik Kebaikan hadir sebagai platform media informasi yang menghubungkan seluruh informasi panti asuhan di kota Malang.

## Teknologi yang Digunakan

### Backend
- PHP 8.2
- Laravel 11.x
- MySQL Database

### Frontend
- Tailwind CSS
- Alpine.js
- Vite

### Development Tools
- Laravel Breeze
- Laravel Vite Plugin
- Laravel Sail (untuk Docker development)
- PHPUnit untuk testing

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL Database
- Git

## Cara Instalasi

1. Clone repository
```bash
git clone [URL_REPOSITORY]
cd ProjectPanti
```

2. Install dependencies PHP menggunakan Composer
```bash
composer install
```

3. Install dependencies JavaScript menggunakan NPM
```bash
npm install
```

4. Salin file .env.example menjadi .env
```bash
cp .env.example .env
```

5. Generate application key
```bash
php artisan key:generate
```

6. Konfigurasi database di file .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

7. Jalankan migrasi database
```bash
php artisan migrate
```

8. Jalankan seeder (jika ada)
```bash
php artisan db:seed
```

## Menjalankan Aplikasi

1. Jalankan server development Laravel
```bash
php artisan serve
```

2. Di terminal terpisah, jalankan Vite untuk development assets
```bash
npm run dev
```

3. Buka browser dan akses `http://localhost:8000`

## Pengembangan

Untuk menjalankan semua service development sekaligus (server, queue, logs, dan vite), gunakan perintah:
```bash
composer dev
```

## Testing

Jalankan test suite menggunakan PHPUnit:
```bash
php artisan test
```

## Kontribusi

1. Fork repository
2. Buat branch fitur baru (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request


