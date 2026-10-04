# Jobsheet 12: Transaction dan Integritas Stok

Jobsheet ini melanjutkan aplikasi inventaris Jobsheet 11. Tabel `transaksi_stok` menyimpan mutasi masuk/keluar untuk barang yang sudah ada di tabel `barang`.

## Persiapan Database

Jalankan skema sekali pada database PostgreSQL yang sama dengan Jobsheet 11:

```bash
psql "$DATABASE_URL" -f sql/01_transaksi_stok.sql
```

Pastikan tabel `barang` tersedia sebelum menjalankan skema.

## Alur Pengujian

1. Login menggunakan akun Jobsheet 11.
2. Buka `/jobsheet-12/index.php`, lalu pilih **Catat Mutasi**.
3. Catat barang masuk dan periksa nilai stok di Jobsheet 11.
4. Catat barang keluar; jumlah yang melebihi stok harus ditolak.
5. Buka riwayat untuk memeriksa jenis, jumlah, waktu, barang, dan catatan.
6. Uji dua permintaan barang keluar bersamaan ketika stok tinggal sedikit. Penguncian `FOR UPDATE` memastikan kedua proses tidak mengurangi stok yang sama secara bersamaan.

Pembaruan stok dan pencatatan mutasi berada dalam satu transaction database. Jika salah satunya gagal, keduanya dibatalkan.