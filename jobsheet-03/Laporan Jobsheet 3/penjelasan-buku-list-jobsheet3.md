# Penjelasan Kode `buku/list.html` — Daftar Buku (Jobsheet 3)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1">` | **Baru:** membuat halaman menyesuaikan lebar layar perangkat, kunci utama tampilan responsif |
| `<title>SIMPUS-Mini \| Beranda</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS di `assets/css/style.css` |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<input type="checkbox" id="nav-toggle" class="nav-toggle">` | **Baru:** checkbox tersembunyi sebagai saklar buka-tutup menu di layar sempit |
| `<label for="nav-toggle" class="nav-toggle-label">&#9776;</label>` | **Baru:** ikon hamburger yang terhubung ke checkbox di atas |
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
| `<div class="table-responsive">` | **Baru:** pembungkus tabel supaya bisa di-scroll horizontal di layar sempit |
| `<table>` | Membuat tabel |
| `<thead><tr><th>...</th></tr></thead>` | Baris judul kolom, yaitu No., Judul, Pengarang, Tahun, Stok, dan Aksi |
| `<tbody>` | Berisi data buku, terdiri dari 10 baris data |
| `<tr><td>...</td></tr>` | Satu baris mewakili satu data buku (nomor urut, judul, pengarang, tahun terbit, jumlah stok) |
| `<button type="button">Edit</button>` | Tombol Edit, pada tahap ini belum memiliki fungsi |
| `<button type="button">Detail</button>` | **Baru:** tombol tambahan untuk melihat detail data buku, belum memiliki fungsi |
| `<button type="button">Hapus</button>` | Tombol Hapus, juga belum memiliki fungsi |
| `</tbody></table>` | Menutup isi dan tabel |
| `</div>` | Menutup pembungkus `table-responsive` |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 3</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet sudah diperbarui |
| `</footer></body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 1)

- Ditambahkan `<meta name="viewport" ...>` dan mekanisme hamburger menu (checkbox + label) agar halaman responsif
- Tabel dibungkus `<div class="table-responsive">` supaya bisa di-scroll ke samping di layar kecil
- Ditambahkan tombol **Detail** di setiap baris data, di antara tombol Edit dan Hapus
- Keterangan footer diperbarui menjadi "Jobsheet 3"
