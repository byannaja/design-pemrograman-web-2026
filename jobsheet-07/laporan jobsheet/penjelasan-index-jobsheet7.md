# Penjelasan Kode `index.php` — Beranda (Jobsheet 7)

| Kode | Penjelasan |
|---|---|
| `<?php session_start(); ?>` | **Baru:** mengaktifkan session PHP di halaman Beranda. Meskipun halaman ini belum memakai data dari session secara langsung (angka-angka ringkasan masih statis), pemanggilan `session_start()` di awal setiap halaman adalah praktik yang konsisten diterapkan di semua file PHP pada Jobsheet 7 ini, supaya session tetap "menyambung" antar halaman |
| `<title>Beranda - SIMPUS-Mini</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS |
| `<button id="nav-toggle" class="nav-toggle" type="button">&#9776;</button>` | Tombol hamburger yang dikendalikan JavaScript |
| `<a href="index.php">Beranda</a>` | **Berubah:** tautan kini menunjuk ke `index.php`, bukan lagi `index.html` |
| `<a href="buku/list.php">Daftar Buku</a>` | Tautan menuju halaman Daftar Buku (kini `.php`) |
| `<a href="buku/tambah.php">Tambah Buku</a>` | Tautan menuju halaman Tambah Buku (kini `.php`) |
| `<a href="anggota/list.php">Daftar Anggota</a>` | Tautan menuju halaman Daftar Anggota (kini `.php`) |
| `<a href="anggota/tambah.php">Tambah Anggota</a>` | Tautan menuju halaman Tambah Anggota (kini `.php`) |
| `<h2>Selamat Datang di Sistem Perpustakaan Mini</h2>` dan `<p>...</p>` | Sambutan halaman Beranda, isinya tidak berubah |
| `<h2>Ringkasan</h2>` dan kartu-kartu statistiknya | Total Buku (10), Total Anggota (10), Sedang Dipinjam (3), Buku Terlambat (2) — **masih ditulis statis**, tidak dihitung otomatis dari session |
| `<script src="assets/js/app.js"></script>` | Memuat file JavaScript umum untuk mengaktifkan hamburger menu |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 6)

- File berubah dari `.html` menjadi `.php`, dengan tambahan `session_start()` di awal
- Seluruh tautan navigasi diperbarui dari `.html` menjadi `.php`
- Isi konten (sambutan dan kartu ringkasan) tidak berubah — angka-angkanya masih ditulis manual

