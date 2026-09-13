# Penjelasan Kode `buku/tambah.html` — Tambah Buku (Jobsheet 5)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1">` | Membuat halaman menyesuaikan lebar layar perangkat |
| `<title>SIMPUS-Mini \| Tambah Buku</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<button type="button" id="nav-toggle" class="nav-toggle">&#9776;</button>` | **Berubah signifikan:** tombol hamburger sekarang elemen `<button>` yang dikendalikan JavaScript |
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
| `<form id="form-tambah">` | **Berubah:** form diberi `id="form-tambah"` supaya bisa dikenali dan divalidasi oleh JavaScript. Berbeda dengan form Tambah Anggota, di sini **belum** ditambahkan atribut `novalidate` |
| `<label for="judul">Judul</label>` | Label untuk kolom input judul buku |
| `<input type="text" id="judul" name="judul" required>` | Kolom input judul buku; atribut `required` **masih dipertahankan** di sini (berbeda dari form anggota yang sudah menghapusnya), sehingga validasi wajib-isi dilakukan dobel: oleh browser (`required`) dan oleh JavaScript |
| `<label for="pengarang">Pengarang</label>` | Label untuk kolom input nama pengarang |
| `<input type="text" id="pengarang" name="pengarang" required>` | Kolom input nama pengarang, wajib diisi (atribut `required` masih ada) |
| `<label for="tahun">Tahun Terbit</label>` | Label untuk kolom input tahun terbit |
| `<input type="number" id="tahun" name="tahun" min="1900" max="2026" required>` | Kolom input tahun terbit, dibatasi 1900–2026, wajib diisi; juga divalidasi ulang oleh JavaScript dengan aturan rentang yang sama |
| `<label for="isbn">ISBN</label>` | Label untuk kolom input ISBN |
| `<input type="text" id="isbn" name="isbn">` | Kolom input ISBN, tidak wajib diisi; jika diisi, JavaScript memvalidasi hanya boleh berisi angka dan tanda hubung (`-`) |
| `<label for="stok">Stok</label>` | Label untuk kolom input jumlah stok |
| `<input type="number" id="stok" name="stok" min="0" required>` | Kolom input stok, minimal 0, wajib diisi |
| `<label for="kategori">Kategori</label>` | Label untuk kolom pilihan kategori buku |
| `<select id="kategori" name="kategori">` | Membuka dropdown pilihan kategori |
| `<option value="fiksi">Fiksi</option>` | Pilihan kategori Fiksi |
| `<option value="non-fiksi">Non-Fiksi</option>` | Pilihan kategori Non-Fiksi |
| `<option value="referensi">Referensi</option>` | Pilihan kategori Referensi |
| `</select>` | Menutup dropdown kategori |
| `<button type="submit">Simpan</button>` | Tombol untuk mengirimkan data form |
| `</form>` | Menutup form |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 5</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet diperbarui menjadi Jobsheet 5 |
| `<script src="../assets/js/app.js"></script>` | **Baru:** memuat file JavaScript `app.js` yang mengaktifkan fitur hamburger menu dan validasi form di halaman ini |
| `</body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 3/4)

- Ditambahkan `<script src="../assets/js/app.js"></script>` untuk mengaktifkan JavaScript
- Form diberi `id="form-tambah"` supaya bisa divalidasi lewat JavaScript
- Tombol hamburger diganti dari checkbox tersembunyi menjadi `<button>` yang dikendalikan JavaScript
- Keterangan footer diperbarui menjadi "Jobsheet 5"

