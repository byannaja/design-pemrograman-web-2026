# Penjelasan Kode `buku/tambah.html` — Tambah Buku (Jobsheet 4)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1">` | Membuat halaman menyesuaikan lebar layar perangkat, kunci utama tampilan responsif |
| `<title>SIMPUS-Mini \| Tambah Buku</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS di `assets/css/style.css` |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<input type="checkbox" id="nav-toggle" class="nav-toggle">` | Checkbox tersembunyi sebagai saklar buka-tutup menu di layar sempit |
| `<label for="nav-toggle" class="nav-toggle-label">&#9776;</label>` | Ikon hamburger yang terhubung ke checkbox di atas |
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
| `<input type="number" id="tahun" name="tahun" min="1900" max="2026" required>` | Kolom input angka tahun terbit, dibatasi 1900–2026, wajib diisi |
| `<label for="isbn">ISBN</label>` | Label untuk kolom input ISBN |
| `<input type="text" id="isbn" name="isbn">` | Kolom input ISBN buku, tidak wajib diisi |
| `<label for="stok">Stok</label>` | Label untuk kolom input jumlah stok |
| `<input type="number" id="stok" name="stok" min="0" required>` | Kolom input angka stok, minimal 0, wajib diisi |
| `<label for="kategori">Kategori</label>` | Label untuk kolom pilihan kategori buku |
| `<select id="kategori" name="kategori">` | Membuka dropdown pilihan kategori |
| `<option value="fiksi">Fiksi</option>` | Pilihan kategori Fiksi |
| `<option value="non-fiksi">Non-Fiksi</option>` | Pilihan kategori Non-Fiksi |
| `<option value="referensi">Referensi</option>` | Pilihan kategori Referensi |
| `</select>` | Menutup dropdown kategori |
| `<button type="submit">Simpan</button>` | Tombol untuk mengirimkan data form; belum terhubung ke proses penyimpanan data |
| `</form>` | Menutup form |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 4</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet diperbarui menjadi Jobsheet 4 |
| `</footer></body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 3)

- Tidak ada perubahan struktur maupun kolom form — halaman ini persis sama dengan versi Jobsheet 3
- Satu-satunya perubahan adalah keterangan footer, dari "Jobsheet 3" menjadi "Jobsheet 4"
