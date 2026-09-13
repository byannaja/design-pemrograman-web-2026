# Penjelasan Kode `anggota/list.html` — Daftar Anggota (Jobsheet 6)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1.0">` | Membuat halaman menyesuaikan lebar layar perangkat |
| `<title>Daftar Anggota - SIMPUS-Mini</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<button id="nav-toggle" class="nav-toggle" type="button">&#9776;</button>` | Tombol hamburger yang dikendalikan JavaScript |
| `<nav>`, `<ul>`, `<li>` | Wadah menu navigasi beserta daftar dan item-item menunya |
| `<a href="../index.html">Beranda</a>` | Tautan menuju halaman Beranda |
| `<a href="../buku/list.html">Daftar Buku</a>` | Tautan menuju halaman Daftar Buku |
| `<a href="../buku/tambah.html">Tambah Buku</a>` | Tautan menuju halaman Tambah Buku |
| `<a href="list.html">Daftar Anggota</a>` | Tautan menuju halaman yang sedang dibuka saat ini |
| `<a href="tambah.html">Tambah Anggota</a>` | Tautan menuju halaman Tambah Anggota |
| `</nav>`, `</header>` | Menutup bagian navigasi dan header |
| `<main>` | Berisi konten utama halaman |
| `<section>` | Mengelompokkan konten daftar anggota |
| `<h2>Daftar Anggota</h2>` | Judul dari bagian ini |
| `<div class="search-box">` | Pembungkus kolom pencarian dan tombol muat ulang |
| `<input type="text" id="search-input" placeholder="Cari berdasarkan nama anggota...">` | Kolom pencarian, terhubung dengan `initTableFilter()` di `app.js` |
| `<button type="button" id="btn-reload">Muat Ulang</button>` | **Baru:** tombol untuk memuat ulang data anggota dari JSON. **Catatan:** tombol ini ada di HTML, tetapi di `anggota.js` **belum ada** fungsi `initReloadAnggota()` seperti halnya `initReloadBuku()` di `buku.js` — sehingga tombol ini kemungkinan **belum berfungsi** sampai fungsinya ditambahkan |
| `</div>` | Menutup pembungkus search box |
| `<p id="table-counter"></p>` | Elemen kosong untuk penghitung data (lihat catatan di `app.js` — fungsi pengisiannya sudah dihapus) |
| `<p id="loading-indicator" style="display: none;">Memuat data...</p>` | Elemen indikator loading, disembunyikan default, ditampilkan otomatis saat data sedang diambil |
| `<div class="table-responsive">` | Pembungkus tabel supaya bisa di-scroll horizontal |
| `<table>` | Membuat tabel |
| `<thead><tr><th>No. Anggota</th><th>Nama</th><th>Alamat</th><th>No. HP</th><th>Aksi</th></tr></thead>` | Baris judul kolom |
| `<tbody></tbody>` | **Berubah signifikan:** `tbody` kosong, seluruh baris data akan diisi secara dinamis oleh `anggota.js` setelah data dari `anggota.json` berhasil dimuat |
| `</table></div>` | Menutup tabel dan pembungkusnya |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 6</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet diperbarui menjadi Jobsheet 6 |
| `<script src="../assets/js/app.js"></script>` | Memuat file JavaScript umum lebih dulu |
| `<script src="../assets/js/anggota.js"></script>` | **Baru:** memuat file JavaScript khusus untuk memuat data anggota; urutannya harus setelah `app.js` |
| `</body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 5)

- Data anggota tidak lagi ditulis statis di HTML — `<tbody>` sekarang kosong dan diisi dinamis lewat `fetch()` dari `anggota.json`
- Ditambahkan tombol **Muat Ulang** dan elemen indikator loading
- Ditambahkan file script baru: `anggota.js`, dimuat setelah `app.js`
- Format judul tab browser dan urutan atribut tombol hamburger sedikit disesuaikan
