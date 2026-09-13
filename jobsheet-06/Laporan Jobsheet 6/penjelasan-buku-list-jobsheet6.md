# Penjelasan Kode `buku/list.html` — Daftar Buku (Jobsheet 6)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1.0">` | Membuat halaman menyesuaikan lebar layar perangkat |
| `<title>Daftar Buku - SIMPUS-Mini</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<button id="nav-toggle" class="nav-toggle" type="button">&#9776;</button>` | Tombol hamburger yang dikendalikan JavaScript |
| `<nav>`, `<ul>`, `<li>` | Wadah menu navigasi beserta daftar dan item-item menunya |
| `<a href="../index.html">Beranda</a>` | Tautan menuju halaman Beranda |
| `<a href="list.html">Daftar Buku</a>` | Tautan menuju halaman yang sedang dibuka saat ini |
| `<a href="tambah.html">Tambah Buku</a>` | Tautan menuju halaman Tambah Buku |
| `<a href="../anggota/list.html">Daftar Anggota</a>` | Tautan menuju halaman Daftar Anggota |
| `<a href="../anggota/tambah.html">Tambah Anggota</a>` | Tautan menuju halaman Tambah Anggota |
| `</nav>`, `</header>` | Menutup bagian navigasi dan header |
| `<main>` | Berisi konten utama halaman |
| `<section>` | Mengelompokkan konten daftar buku |
| `<h2>Daftar Buku</h2>` | Judul dari bagian ini |
| `<div class="search-box">` | Pembungkus kolom pencarian dan tombol muat ulang |
| `<input type="text" id="search-input" placeholder="Cari judul buku...">` | Kolom pencarian, terhubung dengan `initTableFilter()` di `app.js` |
| `<button type="button" id="btn-reload">Muat Ulang</button>` | **Baru:** tombol untuk memuat ulang data buku dari JSON, terhubung dengan `initReloadBuku()` di `buku.js` |
| `</div>` | Menutup pembungkus search box |
| `<p id="table-counter"></p>` | Elemen kosong untuk penghitung data (perlu dicek — lihat catatan di bawah) |
| `<p id="loading-indicator" style="display: none;">Memuat data...</p>` | **Baru:** elemen teks indikator loading, disembunyikan secara default (`display: none`), ditampilkan otomatis oleh `muatDataJSON()` saat data sedang diambil |
| `<div class="table-responsive">` | Pembungkus tabel supaya bisa di-scroll horizontal |
| `<table>` | Membuat tabel |
| `<thead><tr><th>No</th><th>Judul</th><th>Pengarang</th><th>Tahun</th><th>Stok</th><th>Kategori</th><th>Aksi</th></tr></thead>` | Baris judul kolom; **ditambahkan kolom baru "Kategori"** dibanding versi sebelumnya |
| `<tbody></tbody>` | **Berubah signifikan:** `tbody` sekarang **kosong**, tidak lagi berisi baris data statis — seluruh baris akan diisi secara dinamis oleh JavaScript (`buku.js`) setelah data dari `buku.json` berhasil dimuat |
| `</table></div>` | Menutup tabel dan pembungkusnya |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 6</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet diperbarui menjadi Jobsheet 6 |
| `<script src="../assets/js/app.js"></script>` | Memuat file JavaScript umum lebih dulu (berisi fungsi generik `muatDataJSON`, hamburger menu, dll) |
| `<script src="../assets/js/buku.js"></script>` | **Baru:** memuat file JavaScript khusus untuk memuat data buku; **urutannya harus setelah `app.js`**, karena `buku.js` memanggil fungsi `muatDataJSON()` yang didefinisikan di `app.js` |
| `</body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 5)

- Data buku tidak lagi ditulis statis di HTML — `<tbody>` sekarang kosong dan diisi dinamis lewat `fetch()` dari `buku.json`
- Ditambahkan kolom tabel baru: **Kategori**
- Ditambahkan tombol **Muat Ulang** (`#btn-reload`) di sebelah kolom pencarian
- Ditambahkan elemen indikator loading (`#loading-indicator`)
- Ditambahkan file script baru: `buku.js`, dimuat setelah `app.js`
