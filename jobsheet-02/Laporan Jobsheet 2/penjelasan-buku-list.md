# Penjelasan Kode `buku/list.html` — Daftar Buku

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<title>SIMPUS-Mini \| Daftar Buku</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS di `assets/css/style.css`. Karena file ini ada di dalam folder `buku/`, path-nya memakai `../` untuk naik satu folder dulu sebelum menuju folder `assets` |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<nav>`, `<ul>`, `<li>` | Wadah menu navigasi beserta daftar dan item-item menunya |
| `<a href="../index.html">Beranda</a>` | Tautan menuju halaman Beranda |
| `<a href="list.html">Daftar Buku</a>` | Tautan menuju halaman yang sedang dibuka saat ini |
| `<a href="tambah.html">Tambah Buku</a>` | Tautan menuju halaman Tambah Buku |
| `<a href="../anggota/list.html">Daftar Anggota</a>` | Tautan menuju halaman Daftar Anggota |
| `<a href="../anggota/tambah.html">Tambah Anggota</a>` | Tautan menuju halaman Tambah Anggota |
| `</nav>`, `</header>` | Menutup bagian navigasi dan header |
| `<main>` | Berisi konten utama halaman |
| `<section>` | Mengelompokkan konten tabel daftar buku |
| `<h2>Daftar Buku</h2>` | Judul dari bagian ini |
| `<table>` | Membuat tabel |
| `<thead><tr><th>...</th></tr></thead>` | Baris judul kolom, yaitu No., Judul, Pengarang, Tahun, Stok, dan Aksi |
| `<tbody>` | Berisi data buku, terdiri dari 10 baris data |
| `<tr><td>...</td></tr>` | Satu baris mewakili satu data buku (nomor urut, judul, pengarang, tahun terbit, jumlah stok) |
| `<button type="button">Edit</button>` | Tombol Edit, pada tahap ini belum memiliki fungsi |
| `<button type="button">Hapus</button>` | Tombol Hapus, juga belum memiliki fungsi |
| `</tbody></table></section></main>` | Menutup tabel, section, dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 1</p>` | Bagian bawah halaman beserta teks hak cipta |
| `</footer></body></html>` | Menutup seluruh elemen halaman |

