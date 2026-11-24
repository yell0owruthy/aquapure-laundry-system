[readme (1).md](https://github.com/user-attachments/files/35310326/readme.1.md)
# AquaPure Laundry — Sistem Informasi Manajemen Laundry

Aplikasi **Sistem Informasi Manajemen Laundry Berbasis Web** yang dibangun menggunakan framework **Laravel** untuk membantu pengelolaan jenis layanan cuci, pencatatan transaksi pelanggan, pemantauan status pengerjaan, rekap keuangan, serta cetak struk transaksi.

Proyek ini dibuat untuk memenuhi tugas **ASAS KK RPL XII**.

## Fitur Utama

- **Autentikasi & Hak Akses Role (`Admin` & `Kasir`)**:
  - **Admin**: Akses penuh ke Dashboard, kelola Data Layanan (CRUD), Rekap Transaksi Laundry, dan Cetak Struk.
  - **Kasir**: Fokus pada Dashboard, pencatatan transaksi baru, update status cucian, Rekap Transaksi, dan Cetak Struk (akses ke `/layanan` dibatasi melalui `RoleMiddleware`).
- **CRUD Data Layanan**: Tambah, lihat, ubah, dan hapus paket layanan cuci lengkap dengan proteksi agar layanan yang masih dipakai di transaksi tidak terhapus sembarangan.
- **Transaksi & Perhitungan Tarif Otomatis**: Input nama pelanggan, nomor HP, jenis layanan, dan berat cucian (kg) dengan kalkulasi tarif otomatis (`harga_per_kg × berat`).
- **Update Status & Rekap Keuangan**: Perubahan status pengerjaan satu klik dari **Proses** menjadi **Selesai**, filter status (`Semua`, `Proses`, `Selesai`), pencarian cepat, dan ringkasan total pendapatan.
- **Cetak Struk Transaksi**: Halaman nota/struk siap cetak atau simpan ke PDF langsung dari browser.
- **UI/UX Responsif & Mode Terang/Gelap**: Tampilan modern dengan Tailwind CSS yang menyesuaikan layar desktop, tablet, maupun HP, dilengkapi tombol switch **Terang / Gelap**.

## Daftar Layanan Awal (Seeder)

| Jenis Layanan | Tarif / Kg | Estimasi Pengerjaan |
| :--- | :--- | :--- |
| Reguler | Rp 7.000/kg | 3–4 hari |
| Ekspress | Rp 12.000/kg | 1–2 hari |
| Superkilat | Rp 25.000/kg | 5 jam selesai |

## Struktur Database & Relasi

| Tabel | Fungsi Utama | Relasi |
| :--- | :--- | :--- |
| `users` | Menyimpan akun pengguna beserta kolom `role` (`admin` / `kasir`). | `hasMany` ke `transaksis` |
| `layanans` | Menyimpan nama layanan, `harga_per_kg`, dan `estimasi`. | `hasMany` ke `transaksis` |
| `transaksis` | Menyimpan data pelanggan, berat, total tarif, dan status (`Proses` / `Selesai`). | `belongsTo` ke `layanans` (`layanan_id`) & `users` (`user_id`) |

## Teknologi yang Digunakan

- **Backend**: PHP & Laravel Framework
- **Database**: MySQL
- **Frontend**: Blade Template & Tailwind CSS

## Cara Menjalankan Proyek

1. Clone repository ini:
   ```bash
   git clone https://github.com/yell0owruthy/aquapure-laundry-system.git
   cd aquapure-laundry-system
   ```

2. Install dependensi PHP:
   ```bash
   composer install
   ```

3. Salin file `.env.example` menjadi `.env` lalu atur koneksi database MySQL (`DB_DATABASE=db_laundry`):
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Jalankan migrasi dan seeder data awal:
   ```bash
   php artisan migrate
   php artisan db:seed --class=LaundrySeeder
   ```

5. Jalankan server lokal Laravel:
   ```bash
   php artisan serve
   ```
   Buka browser dan akses `http://127.0.0.1:8000`.

## Akun Pengujian

| Role | Email | Password |
| :--- | :--- | :--- |
| Admin | `admin@laundry.test` | `password` |
| Kasir | `kasir@laundry.test` | `password` |
