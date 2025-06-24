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

8. Jalankan seeder untuk membuat data awal (termasuk akun admin default):
```bash
php artisan db:seed
```

> **Catatan:** Seeder akan membuat beberapa akun admin default yang bisa digunakan untuk login ke panel admin:
> - Email: **admin@gmail.com** / Password: **admin123**

## Menjalankan Aplikasi

1. Jalankan server development Laravel
```bash
php artisan serve
```