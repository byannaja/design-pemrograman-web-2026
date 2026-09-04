# Penjelasan Kode `index.html` — Beranda (Jobsheet 4)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1">` | Membuat halaman menyesuaikan lebar layar perangkat, kunci utama tampilan responsif |
| `<title>SIMPUS-Mini \| Beranda</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS di `assets/css/style.css` |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<input type="checkbox" id="nav-toggle" class="nav-toggle">` | Checkbox tersembunyi sebagai saklar buka-tutup menu di layar sempit |
| `<label for="nav-toggle" class="nav-toggle-label">&#9776;</label>` | Ikon hamburger yang terhubung ke checkbox di atas |
| `<nav>`, `<ul>`, `<li>` | Wadah menu navigasi beserta daftar dan item-item menunya |
| `<a href="index.html">Beranda</a>` | Tautan menuju halaman yang sedang dibuka saat ini |
| `<a href="buku/list.html">Daftar Buku</a>` | Tautan menuju halaman Daftar Buku |
| `<a href="buku/tambah.html">Tambah Buku</a>` | Tautan menuju halaman Tambah Buku |
| `<a href="anggota/list.html">Daftar Anggota</a>` | Tautan menuju halaman Daftar Anggota |
| `<a href="anggota/tambah.html">Tambah Anggota</a>` | Tautan menuju halaman Tambah Anggota |
| `</nav>`, `</header>` | Menutup bagian navigasi dan header |
| `<main>` | Berisi konten utama halaman |
| `<section>` (pertama) | Mengelompokkan bagian sambutan/pembuka halaman |
| `<h2>Selamat Datang di Sistem Perpustakaan Mini</h2>` | Judul sambutan pada halaman beranda |
| `<p>Aplikasi sederhana untuk mengelola data buku dan anggota perpustakaan.</p>` | Deskripsi singkat mengenai fungsi aplikasi |
| `<section>` (kedua) | Mengelompokkan bagian ringkasan data |
| `<h2>Ringkasan</h2>` | Judul bagian ringkasan |
| `<div class="stats-container">` | Pembungkus seluruh kartu ringkasan, diatur pakai CSS Grid supaya jumlah kolomnya menyesuaikan lebar layar |
| `<article>` | Membungkus satu blok informasi ringkasan yang berdiri sendiri |
| `<h3>Total Buku</h3>` dan `<p>15</p>` | Menampilkan judul dan angka total buku |
| `<h3>Total Anggota</h3>` dan `<p>10</p>` | Menampilkan judul dan angka total anggota |
| `<h3>Sedang Dipinjam</h3>` dan `<p>3</p>` | Menampilkan judul dan angka buku yang sedang dipinjam |
| `<h3>Buku Terlambat</h3>` dan `<p>2</p>` | Menampilkan judul dan angka buku yang terlambat dikembalikan |
| `</div>` | Menutup pembungkus `stats-container` |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 4</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet diperbarui menjadi Jobsheet 4 |
| `</footer></body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 3)

- Tidak ada perubahan struktur maupun angka pada kartu ringkasan — halaman ini persis sama dengan versi Jobsheet 3
- Satu-satunya perubahan adalah keterangan footer, dari "Jobsheet 3" menjadi "Jobsheet 4"
