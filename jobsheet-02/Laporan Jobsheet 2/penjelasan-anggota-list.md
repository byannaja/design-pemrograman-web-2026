# Penjelasan Kode `anggota/list.html` — Daftar Anggota

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<title>SIMPUS-Mini \| Daftar Anggota</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS di `assets/css/style.css`. Karena file ini ada di dalam folder `anggota/`, path-nya memakai `../` untuk naik satu folder dulu |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>` | Bagian atas halaman yang memuat judul aplikasi dan menu navigasi |
| `<h1>SIMPUS-Mini</h1>` | Judul utama aplikasi |
| `<nav>` | Wadah untuk menu navigasi halaman |
| `<ul>` dan `<li>` | Membuat daftar menu (`ul`) beserta masing-masing itemnya (`li`) |
| `<a href="../index.html">Beranda</a>` | Tautan menuju halaman Beranda |
| `<a href="../buku/list.html">Daftar Buku</a>` | Tautan menuju halaman Daftar Buku |
| `<a href="../buku/tambah.html">Tambah Buku</a>` | Tautan menuju halaman Tambah Buku |
| `<a href="list.html">Daftar Anggota</a>` | Tautan menuju halaman yang sedang dibuka saat ini |
| `<a href="tambah.html">Tambah Anggota</a>` | Tautan menuju halaman untuk menambah anggota baru |
| `</nav>` dan `</header>` | Menutup bagian navigasi dan header |
| `<main>` | Berisi konten utama halaman |
| `<section>` | Mengelompokkan konten tabel daftar anggota |
| `<h2>Daftar Anggota</h2>` | Judul dari bagian ini |
| `<table>` | Membuat tabel |
| `<thead><tr><th>...</th></tr></thead>` | Baris judul kolom, yaitu No. Anggota, Nama, Alamat, No. HP, dan Aksi |
| `<tbody>` | Berisi data anggota, terdiri dari 10 baris data (A001–A010) |
| `<tr><td>...</td></tr>` | Satu baris mewakili satu data anggota |
| `<button type="button">Edit</button>` | Tombol Edit, pada tahap ini belum memiliki fungsi |
| `<button type="button">Hapus</button>` | Tombol Hapus, juga belum memiliki fungsi |
| `</tbody></table></section></main>` | Menutup tabel, section, dan konten utama |
| `<footer>` | Bagian bawah halaman |
| `<p>&copy; 2026 SIMPUS-Mini — Jobsheet 1</p>` | Menampilkan teks hak cipta |
| `</footer></body></html>` | Menutup seluruh elemen halaman |

