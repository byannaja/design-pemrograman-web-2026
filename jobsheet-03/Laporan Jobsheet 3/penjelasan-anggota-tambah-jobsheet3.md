# Penjelasan Kode `anggota/tambah.html` — Tambah Anggota (Jobsheet 3)

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
| `<a href="../buku/list.html">Daftar Buku</a>` | Tautan menuju halaman Daftar Buku |
| `<a href="../buku/tambah.html">Tambah Buku</a>` | Tautan menuju halaman Tambah Buku |
| `<a href="list.html">Daftar Anggota</a>` | Tautan menuju halaman Daftar Anggota |
| `<a href="tambah.html">Tambah Anggota</a>` | Tautan menuju halaman yang sedang dibuka saat ini |
| `</nav>`, `</header>` | Menutup bagian navigasi dan header |
| `<main>` | Berisi konten utama halaman |
| `<section>` | Mengelompokkan konten form tambah anggota |
| `<h2>Tambah Anggota</h2>` | Judul dari bagian ini |
| `<form>` | Membuat form untuk menerima input data dari pengguna |
| `<label for="nama">Nama</label>` | Label untuk kolom input nama |
| `<input type="text" id="nama" name="nama" required>` | Kolom input nama anggota, wajib diisi |
| `<label for="no_anggota">No. Anggota</label>` | Label untuk kolom input nomor anggota |
| `<input type="text" id="no_anggota" name="no_anggota" required>` | Kolom input nomor anggota, wajib diisi |
| `<label for="alamat">Alamat</label>` | Label untuk kolom input alamat |
| `<input type="text" id="alamat" name="alamat">` | Kolom input alamat anggota, tidak wajib diisi |
| `<label for="no_hp">No. HP</label>` | Label untuk kolom input nomor HP |
| `<input type="text" id="no_hp" name="no_hp">` | Kolom input nomor HP anggota, tidak wajib diisi |
| `<button type="submit">Simpan</button>` | Tombol untuk mengirimkan data form; belum terhubung ke proses penyimpanan data |
| `</form>` | Menutup form |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 3</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet sudah diperbarui |
| `</footer></body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 1)

- Ditambahkan `<meta name="viewport" ...>` dan mekanisme hamburger menu (checkbox + label) agar halaman responsif
- Keterangan footer diperbarui menjadi "Jobsheet 3"
- Struktur form tetap sama, belum ada perubahan pada kolom input
