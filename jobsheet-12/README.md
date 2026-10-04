# Jobsheet 12: Transaction dan Integritas Stok

Jobsheet ini merupakan aplikasi mutasi stok mandiri dengan navigasi, autentikasi, session, dan halaman data barang lokal. Koneksi PostgreSQL memakai konfigurasi database proyek. Tabel `transaksi_stok` menyimpan mutasi masuk/keluar untuk barang yang sudah ada di tabel `barang`.

## Persiapan Database

Bootstrap koneksi otomatis membuat tabel `app_sessions` dan `transaksi_stok` jika belum tersedia. Untuk memasang index database juga, jalankan skema berikut sekali pada database PostgreSQL proyek:

```bash
psql "$DATABASE_URL" -f sql/01_transaksi_stok.sql
```

Pastikan tabel `barang` tersedia sebelum menjalankan skema. Session PostgreSQL dipakai agar login tetap tersedia lintas Vercel Functions.

## Alur Pengujian

1. Buka `/jobsheet-12/auth/register.php` untuk membuat akun atau login di `/jobsheet-12/auth/login.php`.
2. Buka `/jobsheet-12/index.php`, lalu pilih **Catat Mutasi**.
3. Catat barang masuk dan periksa nilai stok pada menu **Data Barang**.
4. Catat barang keluar; jumlah yang melebihi stok harus ditolak.
5. Buka riwayat untuk memeriksa jenis, jumlah, waktu, barang, dan catatan.
6. Uji dua permintaan barang keluar bersamaan ketika stok tinggal sedikit. Penguncian `FOR UPDATE` memastikan kedua proses tidak mengurangi stok yang sama secara bersamaan.

Pembaruan stok dan pencatatan mutasi berada dalam satu transaction database. Jika salah satunya gagal, keduanya dibatalkan.