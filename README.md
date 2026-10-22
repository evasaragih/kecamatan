# Website Kecamatan Lubuk Kilangan — Laravel 12

Website resmi kecamatan dengan halaman publik (Beranda, Profil, Kelurahan, Berita, Galeri Kegiatan) dan panel admin untuk CRUD Berita, Galeri, Kelurahan, dan Halaman Profil.

> **Catatan penting**: Nama lurah, jumlah penduduk, dan foto pada data contoh (seeder) adalah **data dummy/placeholder**, bukan data resmi. Silakan ubah melalui panel admin atau langsung di database sesuai data resmi kecamatan.

---

## 1. Persyaratan

- [Laragon](https://laragon.org/) (sudah termasuk PHP ≥ 8.2, MySQL, Composer)
- PHP ekstensi aktif: `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`, `gd`
- Composer (biasanya sudah include di Laragon terbaru — cek dengan `composer -v`)

## 2. Menyiapkan Folder Project

1. Extract file `kecamatan-lubuk-kilangan.zip` ke folder `laragon/www/kecamatan`
   sehingga strukturnya: `laragon/www/kecamatan/app`, `laragon/www/kecamatan/public`, dst.
2. Buka **Terminal** dari Laragon (klik kanan ikon Laragon → Terminal), lalu masuk ke folder project:
   ```
   cd www/kecamatan
   ```

## 3. Install Dependency PHP

```
composer install
```

Ini akan mengunduh folder `vendor/` (framework Laravel dan semua library) — **wajib dijalankan** karena folder `vendor/` sengaja tidak disertakan dalam zip (ukurannya besar dan harus disesuaikan dengan environment Anda).

## 4. Menyiapkan File Environment (.env)

1. Duplikat `.env.example` menjadi `.env`:
   ```
   copy .env.example .env
   ```
   (di Git Bash / Linux gunakan `cp .env.example .env`)
2. Generate application key:
   ```
   php artisan key:generate
   ```
3. Buka `.env`, pastikan konfigurasi database sudah sesuai dengan MySQL Laragon Anda (default Laragon: user `root`, password kosong):
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=kecamatan_lubuk_kilangan
   DB_USERNAME=root
   DB_PASSWORD=
   ```

## 5. Menyiapkan Database

**Pilihan A — Import file SQL langsung (paling cepat)**

1. Buka HeidiSQL / phpMyAdmin / Adminer dari Laragon.
2. Buat/jalankan file `database/kecamatan_lubuk_kilangan.sql` yang sudah disediakan — file ini otomatis membuat database `kecamatan_lubuk_kilangan`, semua tabel, dan data contoh (seed).

**Pilihan B — Migrate & seed lewat Artisan**

1. Buat database kosong bernama `kecamatan_lubuk_kilangan` lewat HeidiSQL/phpMyAdmin.
2. Jalankan:
   ```
   php artisan migrate --seed
   ```

## 6. Membuat Symbolic Link Storage (untuk upload foto)

```
php artisan storage:link
```

Perintah ini membuat folder `public/storage` yang menghubungkan ke `storage/app/public`, tempat foto berita/galeri/kelurahan yang diupload lewat admin panel disimpan.

## 7. Menjalankan Website

**Opsi A — via Apache Laragon (disarankan)**

1. Klik kanan ikon Laragon → **Www directory** → pastikan project ada di `www/kecamatan`.
2. Klik kanan ikon Laragon → **Apache** → **Auto Virtual Host** (atau tambahkan manual di `Menu → Apache → sites-enabled`) supaya bisa diakses via `http://kecamatan.test`.
3. Start Laragon (klik tombol **Start All**).
4. Buka browser: `http://kecamatan.test`

**Opsi B — via php artisan serve (lebih simpel, tanpa setting vhost)**

```
php artisan serve
```
Lalu buka `http://127.0.0.1:8000`

## 8. Login Admin

Buka `http://kecamatan.test/admin/login` (atau `http://127.0.0.1:8000/admin/login`)

| Role     | Email                                     | Password     |
|----------|--------------------------------------------|--------------|
| Admin    | admin@lubukkilangan.padang.go.id           | admin123     |
| Operator | operator@lubukkilangan.padang.go.id        | operator123  |

**⚠️ Segera ganti password default ini setelah login pertama**, bisa lewat `php artisan tinker` atau menambahkan fitur ganti password di panel admin.

---

## Struktur Fitur

**Halaman Publik**
- `/` — Beranda (hero, berita terbaru, ringkasan kelurahan, galeri)
- `/profil/{slug}` — Sejarah, Visi & Misi, Struktur Organisasi
- `/kelurahan` & `/kelurahan/{slug}` — Daftar & detail kelurahan
- `/berita` & `/berita/{slug}` — Daftar & detail berita
- `/galeri` — Galeri kegiatan

**Panel Admin** (`/admin/login`)
- Dashboard ringkasan
- CRUD Berita (dengan upload foto, kategori, status terbit/draft)
- CRUD Galeri Kegiatan (upload foto + keterangan)
- CRUD Kelurahan (data lurah, jumlah penduduk, luas wilayah, foto)
- Edit konten Halaman Profil (Sejarah/Visi Misi/Struktur Organisasi)

## Tech Stack

- Laravel 12 (PHP 8.2+)
- MySQL
- Blade + Bootstrap 5 (CDN, tanpa perlu `npm install`)
- Font Awesome 6 (CDN)

## Troubleshooting Singkat

- **Error "could not find driver"** → aktifkan ekstensi `pdo_mysql` di `php.ini` Laragon.
- **Foto tidak tampil setelah upload** → pastikan sudah jalankan `php artisan storage:link`.
- **Error 500 blank page** → set `APP_DEBUG=true` di `.env`, cek pesan error, dan lihat `storage/logs/laravel.log`.
- **CSS/tampilan rusak / offline** → layout ini memuat Bootstrap & Font Awesome dari CDN, jadi komputer perlu koneksi internet saat membuka website.



RBAC 
TAMPILAN DASHBOARD
UI/UX
