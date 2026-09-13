# Penjelasan Kode `anggota/tambah.html` — Tambah Anggota (Jobsheet 5)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1.0">` | Membuat halaman menyesuaikan lebar layar perangkat |
| `<title>Tambah Anggota - SIMPUS-Mini</title>` | **Berubah:** format judul tab browser dibalik urutannya |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<button id="nav-toggle" class="nav-toggle" type="button">&#9776;</button>` | **Berubah signifikan:** tombol hamburger sekarang elemen `<button>`, dikendalikan JavaScript, bukan lagi checkbox tersembunyi seperti versi sebelumnya |
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
| `<form id="form-tambah" novalidate>` | **Berubah signifikan:** form diberi `id="form-tambah"` supaya bisa "ditangkap" oleh JavaScript (`initValidasiForm()`), dan atribut `novalidate` ditambahkan untuk mematikan validasi bawaan browser, karena validasi sekarang ditangani sepenuhnya oleh `app.js` |
| `<label for="nama">Nama</label>` | Label untuk kolom input nama |
| `<input type="text" id="nama" name="nama">` | **Berubah:** atribut `required` dihapus dari input ini — validasi wajib isi sekarang dicek lewat JavaScript, bukan atribut HTML bawaan |
| `<label for="no_anggota">No. Anggota</label>` | Label untuk kolom input nomor anggota |
| `<input type="text" id="no_anggota" name="no_anggota">` | Kolom input nomor anggota, atribut `required` juga sudah dihapus, validasi ditangani JavaScript |
| `<label for="alamat">Alamat</label>` | Label untuk kolom input alamat |
| `<input type="text" id="alamat" name="alamat">` | Kolom input alamat anggota, tidak wajib diisi |
| `<label for="no_hp">No. HP</label>` | Label untuk kolom input nomor HP |
| `<input type="text" id="no_hp" name="no_hp">` | Kolom input nomor HP anggota; lewat JavaScript, kolom ini divalidasi hanya boleh berisi angka dan tanda `+` jika diisi |
| `<button type="submit">Simpan</button>` | Tombol untuk mengirimkan data form; saat diklik, akan memicu validasi JavaScript sebelum form benar-benar terkirim |
| `</form>` | Menutup form |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 5</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet diperbarui menjadi Jobsheet 5 |
| `<script src="../assets/js/app.js"></script>` | **Baru:** memuat file JavaScript `app.js` yang berisi seluruh logika interaktif (hamburger menu, validasi form, dan lainnya) |
| `</body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 3/4)

- Ditambahkan `<script src="../assets/js/app.js"></script>` untuk mengaktifkan JavaScript
- Form diberi `id="form-tambah"` dan atribut `novalidate`, supaya validasinya sepenuhnya ditangani oleh JavaScript, bukan lagi validasi bawaan browser
- Atribut `required` dihapus dari kolom Nama dan No. Anggota; validasi wajib-isi kini dilakukan lewat fungsi `initValidasiForm()` di `app.js`
- Format judul tab browser dibalik urutannya
- Keterangan footer diperbarui menjadi "Jobsheet 5"
