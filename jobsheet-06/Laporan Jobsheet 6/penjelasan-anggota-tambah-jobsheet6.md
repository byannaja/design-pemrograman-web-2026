# Penjelasan Kode `anggota/tambah.html` — Tambah Anggota (Jobsheet 6)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1.0">` | Membuat halaman menyesuaikan lebar layar perangkat |
| `<title>Tambah Anggota - SIMPUS-Mini</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<button id="nav-toggle" class="nav-toggle" type="button">&#9776;</button>` | Tombol hamburger yang dikendalikan JavaScript |
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
| `<form id="form-tambah" novalidate>` | Form diberi `id="form-tambah"` dan atribut `novalidate`, validasi ditangani JavaScript |
| `<label for="no_anggota">No. Anggota</label>` | **Berubah urutan:** kolom No. Anggota kini ditempatkan **paling atas**, sebelum Nama (di Jobsheet 3–5 urutannya Nama dulu baru No. Anggota) |
| `<input type="text" id="no_anggota" name="no_anggota" required>` | Kolom input nomor anggota, wajib diisi |
| `<label for="nama">Nama</label>` | Label untuk kolom input nama |
| `<input type="text" id="nama" name="nama" required>` | Kolom input nama anggota, wajib diisi. Divalidasi lewat selector gabungan `[name='judul'], [name='nama']` di `initValidasiForm()` pada `app.js` |
| `<label for="alamat">Alamat</label>` | Label untuk kolom input alamat |
| `<input type="text" id="alamat" name="alamat" required>` | **Berubah:** kolom Alamat kini diberi atribut `required`, sehingga **wajib diisi** — berbeda dari versi sebelumnya (Jobsheet 3–5) yang membiarkan Alamat opsional |
| `<label for="no_hp">No. HP</label>` | Label untuk kolom input nomor HP |
| `<input type="text" id="no_hp" name="no_hp" required>` | **Berubah:** kolom No. HP juga kini diberi atribut `required`, wajib diisi — sebelumnya opsional |
| `<button type="submit">Simpan</button>` | Tombol untuk mengirimkan data form |
| `</form>` | Menutup form |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 6</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet diperbarui menjadi Jobsheet 6 |
| `<script src="../assets/js/app.js"></script>` | Memuat file JavaScript umum, termasuk fungsi validasi form |
| `</body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 5)

- Urutan kolom form diubah: **No. Anggota** kini di posisi paling atas, sebelum Nama
- Kolom **Alamat** dan **No. HP** kini diberi atribut `required`, menjadikannya wajib diisi (sebelumnya opsional)
- Keterangan footer diperbarui menjadi "Jobsheet 6"
