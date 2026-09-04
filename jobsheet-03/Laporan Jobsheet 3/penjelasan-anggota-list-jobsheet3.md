# Penjelasan Kode `anggota/list.html` — Daftar Anggota (Jobsheet 3)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1">` | **Baru:** mengatur agar halaman menyesuaikan lebar layar perangkat (HP, tablet, laptop) dan tidak otomatis di-zoom, ini kunci utama supaya desain responsif bisa bekerja |
| `<title>SIMPUS-Mini \| Beranda</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS di `assets/css/style.css` |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>` | Bagian atas halaman yang memuat judul dan menu navigasi |
| `<h1>SIMPUS-Mini</h1>` | Judul utama aplikasi |
| `<input type="checkbox" id="nav-toggle" class="nav-toggle">` | **Baru:** checkbox tersembunyi yang dipakai sebagai "saklar" untuk buka-tutup menu di layar sempit, tekniknya disebut *checkbox hack* |
| `<label for="nav-toggle" class="nav-toggle-label">&#9776;</label>` | **Baru:** label berupa ikon garis tiga (hamburger menu, `&#9776;`) yang terhubung ke checkbox lewat `for="nav-toggle"`; saat diklik, checkbox-nya ikut tercentang |
| `<nav>` | Wadah untuk menu navigasi halaman |
| `<ul>` dan `<li>` | Membuat daftar menu beserta masing-masing itemnya |
| `<a href="../index.html">Beranda</a>` | Tautan menuju halaman Beranda |
| `<a href="../buku/list.html">Daftar Buku</a>` | Tautan menuju halaman Daftar Buku |
| `<a href="../buku/tambah.html">Tambah Buku</a>` | Tautan menuju halaman Tambah Buku |
| `<a href="list.html">Daftar Anggota</a>` | Tautan menuju halaman yang sedang dibuka saat ini |
| `<a href="tambah.html">Tambah Anggota</a>` | Tautan menuju halaman untuk menambah anggota baru |
| `</nav>`, `</header>` | Menutup bagian navigasi dan header |
| `<main>` | Berisi konten utama halaman |
| `<section>` | Mengelompokkan konten tabel daftar anggota |
| `<h2>Daftar Anggota</h2>` | Judul dari bagian ini |
| `<div class="table-responsive">` | **Baru:** pembungkus tabel supaya tabel bisa di-scroll ke samping (horizontal) kalau lebar layar tidak cukup menampung semua kolom, jadi tabel tidak "pecah" tampilannya di HP |
| `<table>` | Membuat tabel |
| `<thead><tr><th>...</th></tr></thead>` | Baris judul kolom, yaitu No. Anggota, Nama, Alamat, No. HP, dan Aksi |
| `<tbody>` | Berisi data anggota, terdiri dari 10 baris data (A001–A010) |
| `<tr><td>...</td></tr>` | Satu baris mewakili satu data anggota |
| `<button type="button">Edit</button>` | Tombol Edit, pada tahap ini belum memiliki fungsi |
| `<button type="button">Hapus</button>` | Tombol Hapus, juga belum memiliki fungsi |
| `</tbody></table>` | Menutup isi dan tabel |
| `</div>` | Menutup pembungkus `table-responsive` |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>` | Bagian bawah halaman |
| `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 3</p>` | Teks hak cipta, keterangan jobsheet sudah diperbarui jadi Jobsheet 3 |
| `</footer></body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 1)

- Ditambahkan `<meta name="viewport" ...>` supaya halaman responsif di berbagai ukuran layar
- Ditambahkan checkbox tersembunyi + label hamburger (`&#9776;`) sebagai tombol buka-tutup menu di layar sempit, tanpa perlu JavaScript
- Tabel dibungkus `<div class="table-responsive">` agar bisa di-scroll horizontal di layar kecil
- Keterangan footer diperbarui menjadi "Jobsheet 3"