# Penjelasan Kode `buku/tambah.html` — Tambah Buku

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<title>SIMPUS-Mini \| Tambah Buku</title>` | Menentukan judul yang muncul pada tab browser |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
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
| `<form>` | Membuat form untuk menerima input data dari pengguna |
| `<label for="judul">Judul</label>` | Label untuk kolom input judul buku |
| `<input type="text" id="judul" name="judul" required>` | Kolom input judul buku, wajib diisi |
| `<label for="pengarang">Pengarang</label>` | Label untuk kolom input nama pengarang |
| `<input type="text" id="pengarang" name="pengarang" required>` | Kolom input nama pengarang, wajib diisi |
| `<label for="tahun">Tahun Terbit</label>` | Label untuk kolom input tahun terbit |
| `<input type="number" id="tahun" name="tahun" min="1900" max="2026" required>` | Kolom input angka untuk tahun terbit, dibatasi antara 1900 sampai 2026, dan wajib diisi |
| `<label for="isbn">ISBN</label>` | Label untuk kolom input ISBN |
| `<input type="text" id="isbn" name="isbn">` | Kolom input ISBN buku, tidak wajib diisi |
| `<label for="stok">Stok</label>` | Label untuk kolom input jumlah stok |
| `<input type="number" id="stok" name="stok" min="0" required>` | Kolom input angka untuk stok buku, minimal 0, dan wajib diisi |
| `<label for="kategori">Kategori</label>` | Label untuk kolom pilihan kategori buku |
| `<select id="kategori" name="kategori">` | Membuka dropdown pilihan untuk kategori buku |
| `<option value="fiksi">Fiksi</option>` | Pilihan kategori Fiksi |
| `<option value="non-fiksi">Non-Fiksi</option>` | Pilihan kategori Non-Fiksi |
| `<option value="referensi">Referensi</option>` | Pilihan kategori Referensi |
| `</select>` | Menutup dropdown kategori |
| `<button type="submit">Simpan</button>` | Tombol untuk mengirimkan data form; pada tahap ini belum terhubung ke proses penyimpanan data |
| `</form>` | Menutup form |
| `</section>`, `</main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 1</p>` | Bagian bawah halaman beserta teks hak cipta |
| `</footer></body></html>` | Menutup seluruh elemen halaman |
