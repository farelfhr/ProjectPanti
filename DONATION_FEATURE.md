# Fitur Donasi Online - Titik Kebaikan

## Deskripsi
Fitur donasi online telah ditambahkan ke aplikasi Titik Kebaikan yang memungkinkan pengguna untuk berdonasi langsung ke panti asuhan melalui popup modal yang berisi QR code pembayaran dan link WhatsApp untuk konfirmasi.

## Fitur yang Ditambahkan

### 1. Modal Popup Donasi
- Popup modal yang muncul ketika pengguna mengklik tombol "Donasi Sekarang"
- Menampilkan informasi pembayaran lengkap untuk setiap panti
- Responsive design yang bekerja di desktop dan mobile

### 2. Informasi Pembayaran
- **QR Code Pembayaran**: Untuk scan menggunakan e-wallet atau mobile banking
- **Transfer Bank**: Informasi rekening bank panti asuhan
- **Link WhatsApp**: Untuk konfirmasi donasi langsung ke panti

### 3. Panel Admin
- Form untuk mengelola informasi pembayaran setiap panti
- Upload QR code pembayaran
- Input nomor rekening bank dan nama bank
- Input nomor WhatsApp untuk konfirmasi
- Tabel yang menampilkan status informasi pembayaran

## Database Changes

### Migration: `add_payment_info_to_panti_table`
Menambahkan kolom baru ke tabel `panti`:
- `qr_code` (string, nullable) - Path ke file QR code
- `whatsapp_number` (string, nullable) - Nomor WhatsApp
- `bank_account` (string, nullable) - Nomor rekening bank
- `bank_name` (string, nullable) - Nama bank

## File yang Dimodifikasi

### Backend
- `app/Models/Panti.php` - Menambahkan field baru ke fillable
- `app/Http/Controllers/Admin/PantiController.php` - Menambahkan handling untuk field pembayaran
- `database/migrations/2025_06_24_201640_add_payment_info_to_panti_table.php` - Migration baru
- `database/seeders/PaymentInfoSeeder.php` - Seeder untuk data contoh

### Frontend
- `resources/views/components/donation-modal.blade.php` - Komponen modal donasi
- `resources/views/panti/show.blade.php` - Halaman detail panti
- `resources/views/components/panti-grid.blade.php` - Grid panti
- `resources/views/admin/panti/_form.blade.php` - Form admin
- `resources/views/admin/panti/index.blade.php` - Tabel admin
- `resources/views/layouts/app.blade.php` - Layout utama
- `public/js/donation-modal.js` - JavaScript untuk modal

## Cara Penggunaan

### Untuk Admin
1. Login ke panel admin
2. Buka menu "Manajemen Panti"
3. Edit panti yang ingin ditambahkan informasi pembayaran
4. Upload QR code pembayaran (format: JPG, PNG, GIF, max 2MB)
5. Isi informasi bank (nama bank dan nomor rekening)
6. Isi nomor WhatsApp untuk konfirmasi
7. Simpan perubahan

### Untuk Pengguna
1. Buka halaman daftar panti atau detail panti
2. Klik tombol "Donasi Sekarang" atau "Donasi"
3. Modal popup akan muncul dengan informasi pembayaran
4. Scan QR code atau transfer ke rekening yang tersedia
5. Klik link WhatsApp untuk konfirmasi donasi

## Struktur Folder
```
storage/app/public/
├── panti/          # Gambar panti asuhan
└── qr-codes/       # QR code pembayaran

public/js/
└── donation-modal.js  # JavaScript untuk modal donasi
```

## Validasi
- QR code: Image file (JPG, PNG, GIF), max 2MB
- Nomor WhatsApp: String, max 20 karakter
- Nomor rekening: String, max 50 karakter
- Nama bank: String, max 100 karakter

## Keamanan
- File upload divalidasi untuk mencegah upload file berbahaya
- QR code disimpan di folder terpisah untuk organisasi yang lebih baik
- Nomor WhatsApp diformat otomatis untuk link WhatsApp yang valid

## Responsive Design
- Modal responsive untuk desktop dan mobile
- QR code ditampilkan dengan ukuran yang sesuai
- Tombol dan layout menyesuaikan ukuran layar

## Browser Support
- Chrome, Firefox, Safari, Edge (versi terbaru)
- Mobile browsers (iOS Safari, Chrome Mobile)
- JavaScript enabled required

## Troubleshooting

### Modal tidak muncul
1. Pastikan file `donation-modal.js` ter-load dengan benar
2. Periksa console browser untuk error JavaScript
3. Pastikan ID modal unik untuk setiap panti

### QR code tidak tampil
1. Periksa path file di storage
2. Pastikan file ada di folder `storage/app/public/qr-codes/`
3. Jalankan `php artisan storage:link` jika belum

### Link WhatsApp tidak berfungsi
1. Pastikan format nomor WhatsApp benar (08xxxxxxxxxx)
2. Periksa apakah nomor mengandung karakter khusus
3. Test link di browser untuk memastikan format benar 