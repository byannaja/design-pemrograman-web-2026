# Penjelasan Kode `buku/tambah.html` — Tambah Buku (Jobsheet 6)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1.0">` | Membuat halaman menyesuaikan lebar layar perangkat |
| `<title>Tambah Buku - SIMPUS-Mini</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<button id="nav-toggle" class="nav-toggle" type="button">&#9776;</button>` | Tombol hamburger yang dikendalikan JavaScript |
| `<nav>`, `<ul>`, `<li>` | Wadah menu navigasi beserta daftar dan item-item menunya |
| `<a href="../index.html">Beranda</a>` | Tautan menuju halaman Beranda |
| `<a href="list.html">Daftar Buku</a>` | Tautan menuju halaman Daftar Buku |
| `<a href="tambah.html">Tambah Buku</a>` | Tautan menuju halaman yang sedang dibuka saat ini |
| `<a href="../anggota/list.html">Daftar Anggota</a>` | Tautan menuju halaman Daftar Anggota |
| `<a href="../anggota/tambah.html">Tambah Anggota</a>` | Tautan menuju halaman Tambah Anggota |
| `</nav>`, `</header>` | Menutup bagian navigasi dan header |
| `<main>` | Berisi konten utama halaman |
| `<section>` | Mengelompokkan konten form tambah buku |
| `<h2>Tambah Buku</h2>` | Judul dari bagian ini |
| `<form id="form-tambah" novalidate>` | Form diberi `id="form-tambah"` dan atribut `novalidate` — kini **konsisten** dengan form Tambah Anggota (berbeda dengan Jobsheet 5 yang belum memakai `novalidate` di form ini) |
| `<label for="judul">Judul</label>` | Label untuk kolom input judul buku |
| `<input type="text" id="judul" name="judul" required>` | Kolom input judul buku, wajib diisi, tervalidasi ganda oleh HTML `required` dan JavaScript |
| `<label for="pengarang">Pengarang</label>` | Label untuk kolom input nama pengarang |
| `<input type="text" id="pengarang" name="pengarang" required>` | Kolom input nama pengarang, wajib diisi |
| `<label for="tahun">Tahun Terbit</label>` | Label untuk kolom input tahun terbit |
| `<input type="number" id="tahun" name="tahun" min="1900" max="2026" required>` | Kolom input tahun terbit, dibatasi 1900–2026, wajib diisi |
| `<label for="stok">Stok</label>` | Label untuk kolom input jumlah stok |
| `<input type="number" id="stok" name="stok" min="0" required>` | Kolom input stok, minimal 0, wajib diisi |
| `<button type="submit">Simpan</button>` | Tombol untuk mengirimkan data form |
| `</form>` | Menutup form |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 6</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet diperbarui menjadi Jobsheet 6 |
| `<script src="../assets/js/app.js"></script>` | Memuat file JavaScript umum, termasuk fungsi `initValidasiForm()` yang menangani validasi form ini |
| `</body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 5)

- **Kolom ISBN dihapus** dari form — sebelumnya ada `<label for="isbn">` beserta inputnya, sekarang sudah tidak ada
- **Kolom Kategori (`<select>`) juga dihapus** dari form — padahal data di `buku.json` tetap memiliki field `kategori`
- Form kini konsisten memakai `novalidate`, sama seperti form Tambah Anggota
- Keterangan footer diperbarui menjadi "Jobsheet 6"
