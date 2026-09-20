# Penjelasan Kode `includes/header.php` & `includes/footer.php` (Jobsheet 8)

Kedua file ini **baru** di Jobsheet 8. Sebelumnya, setiap halaman (`list.php`, `tambah.php`, `index.php`, dst) menulis ulang seluruh struktur `<head>`, `<header>`, dan `<footer>` masing-masing secara mandiri. Sekarang bagian-bagian yang berulang ini dipisah ke dua file `include`, supaya kalau ada perubahan (misalnya menu navigasi berubah), cukup diedit di satu tempat saja.

## `includes/header.php`

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` s/d `<title>SIMPUS-Mini</title>` | Bagian pembuka HTML seperti biasa. **Catatan:** judul tab browser di sini bersifat **generik** ("SIMPUS-Mini" saja), tidak lagi spesifik per halaman ("Daftar Buku - SIMPUS-Mini", dst) seperti pada Jobsheet 7 — karena judul kini "dipaksa" sama untuk semua halaman yang memakai file header ini |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan CSS. **Catatan penting:** path ini memakai `../`, sehingga hanya benar jika file yang meng-`include` header ini berada satu level di dalam folder (seperti `buku/list.php` atau `anggota/list.php`). Untuk `index.php` yang letaknya di folder utama, path `../assets/css/style.css` ini **tidak tepat** — perlu dicek bagaimana `index.php` menanganinya (lihat catatan di bagian bawah) |
| `<header>` s/d penutup `</header>` | Bagian header dengan judul aplikasi, tombol hamburger, dan menu navigasi — persis sama strukturnya dengan Jobsheet 7 |
| `<a href="../index.php">Beranda</a>` dst | Tautan navigasi, semuanya memakai prefix `../` |
| `<main>` | File ini **sengaja dibiarkan terbuka** (tanpa `</main>`) — karena isi/konten dari tiap halaman (misalnya tabel Daftar Buku) akan disisipkan tepat setelah baris ini, dan baru ditutup nanti oleh `footer.php` |

## `includes/footer.php`

| Kode | Penjelasan |
|---|---|
| `</main>` | Menutup elemen `<main>` yang sengaja dibuka di `header.php` — inilah kenapa kedua file ini harus selalu dipakai berpasangan |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 8</p>` | Footer dengan keterangan hak cipta, kini menunjukkan "Jobsheet 8" |
| `<script src="../assets/js/app.js"></script>` | Memuat file JavaScript |
| `</body></html>` | Menutup seluruh dokumen HTML |

## Cara Kedua File Ini Dipakai

Di setiap halaman (misalnya `buku/list.php`), pola pemakaiannya adalah:

```php
<?php
// ... kode PHP untuk mengambil data ...
include '../includes/header.php';
?>

<section>
    <!-- konten khusus halaman ini -->
</section>

<?php include '../includes/footer.php'; ?>
```

Dengan pola ini, `header.php` membuka struktur HTML sampai `<main>`, lalu halaman menyisipkan kontennya sendiri (misalnya tabel data), dan `footer.php` menutup semuanya kembali.

## Perbedaan dengan Versi Sebelumnya (Jobsheet 7)

- Struktur `<head>`, `<header>`, dan `<footer>` yang tadinya ditulis berulang di setiap file kini dipusatkan menjadi dua file `include`: `header.php` dan `footer.php`
- Ini adalah penerapan prinsip **DRY (Don't Repeat Yourself)** — mengurangi duplikasi kode, sehingga perubahan pada header/footer cukup dilakukan di satu tempat, otomatis berlaku ke semua halaman yang memakainya

