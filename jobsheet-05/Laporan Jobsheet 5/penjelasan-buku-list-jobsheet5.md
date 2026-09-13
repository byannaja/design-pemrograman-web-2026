# Penjelasan Kode `buku/list.html` — Daftar Buku (Jobsheet 5)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1">` | Membuat halaman menyesuaikan lebar layar perangkat |
| `<title>SIMPUS-Mini \| Daftar Buku</title>` | Menentukan judul yang muncul pada tab browser |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<button type="button" id="nav-toggle" class="nav-toggle">&#9776;</button>` | **Berubah signifikan:** tombol hamburger sekarang elemen `<button>` yang dikendalikan JavaScript (`initNavToggle()`), bukan lagi checkbox tersembunyi |
| `<nav>`, `<ul>`, `<li>` | Wadah menu navigasi beserta daftar dan item-item menunya |
| `<a href="../index.html">Beranda</a>` | Tautan menuju halaman Beranda |
| `<a href="list.html">Daftar Buku</a>` | Tautan menuju halaman yang sedang dibuka saat ini |
| `<a href="tambah.html">Tambah Buku</a>` | Tautan menuju halaman Tambah Buku |
| `<a href="../anggota/list.html">Daftar Anggota</a>` | Tautan menuju halaman Daftar Anggota |
| `<a href="../anggota/tambah.html">Tambah Anggota</a>` | Tautan menuju halaman Tambah Anggota |
| `</nav>`, `</header>` | Menutup bagian navigasi dan header |
| `<main>` | Berisi konten utama halaman |
| `<section>` | Mengelompokkan konten daftar buku |
| `<h2>Daftar Buku</h2>` | Judul dari bagian ini |
| `<input type="text" class="search-box" placeholder="Cari buku...">` | **Baru:** kolom input pencarian buku. **Catatan:** di sini class `search-box` dipasang langsung pada elemen `<input>`, berbeda dengan halaman Daftar Anggota yang memasang `search-box` pada `<div>` pembungkus dan input diberi `id="search-input"` — karena skrip `initTableFilter()` di `app.js` mencari elemen lewat `id="search-input"` terlebih dulu baru fallback ke `.search-box input`, pencarian di halaman ini tetap akan terdeteksi lewat jalur fallback tersebut |
| `<div class="table-responsive">` | Pembungkus tabel supaya bisa di-scroll horizontal di layar sempit |
| `<table>` | Membuat tabel |
| `<thead><tr><th>...</th></tr></thead>` | Baris judul kolom, yaitu No., Judul, Pengarang, Tahun, Stok, dan Aksi |
| `<tbody>` | Berisi data buku, terdiri dari 10 baris data |
| `<tr><td>...</td></tr>` | Satu baris mewakili satu data buku |
| `<button type="button">Edit</button>` | Tombol Edit, belum memiliki fungsi |
| `<button type="button">Detail</button>` | Tombol untuk melihat detail buku, belum memiliki fungsi |
| `<button type="button" class="btn-hapus">Hapus</button>` | **Baru:** tombol Hapus kini diberi `class="btn-hapus"`, sehingga terhubung dengan fungsi `initHapusConfirm()` di `app.js` — saat diklik akan memunculkan dialog konfirmasi, dan jika disetujui baris data akan terhapus dari tampilan |
| `</tbody></table>` | Menutup isi dan tabel |
| `</div>` | Menutup pembungkus `table-responsive` |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 5</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet diperbarui menjadi Jobsheet 5 |
| `<script src="../assets/js/app.js"></script>` | **Baru:** memuat file JavaScript `app.js` yang mengaktifkan fitur hamburger menu, pencarian, dan konfirmasi hapus di halaman ini |
| `</body></html>` | Menutup seluruh elemen halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 3/4)

- Ditambahkan `<script src="../assets/js/app.js"></script>` untuk mengaktifkan JavaScript
- Ditambahkan kolom pencarian buku (`<input class="search-box">`)
- Tombol Hapus diberi `class="btn-hapus"`, sehingga fitur konfirmasi hapus dari JavaScript kini aktif
- Tombol hamburger diganti dari checkbox tersembunyi menjadi `<button>` yang dikendalikan JavaScript
- **Belum ada** elemen `#table-counter` di halaman ini, berbeda dengan halaman Daftar Anggota — sehingga penghitung jumlah data hasil pencarian tidak akan tampil di halaman ini meskipun fungsinya tetap berjalan di belakang layar
- Keterangan footer diperbarui menjadi "Jobsheet 5"

