# Penjelasan Kode `anggota/list.html` — Daftar Anggota (Jobsheet 5)

| Kode | Penjelasan |
|---|---|
| `<!DOCTYPE html>` | Menandakan bahwa dokumen ini menggunakan HTML5 |
| `<html lang="id">` | Elemen pembuka halaman HTML, dengan `lang="id"` menunjukkan bahasa yang digunakan adalah Bahasa Indonesia |
| `<head>` | Bagian yang berisi informasi halaman, namun tidak ditampilkan langsung ke pengguna |
| `<meta charset="UTF-8">` | Mengatur encoding karakter agar simbol atau huruf khusus dapat ditampilkan dengan benar |
| `<meta name="viewport" content="width=device-width, initial-scale=1.0">` | Membuat halaman menyesuaikan lebar layar perangkat |
| `<title>Daftar Anggota - SIMPUS-Mini</title>` | **Berubah:** format judul tab browser dibalik, dari "SIMPUS-Mini \| Daftar Anggota" menjadi "Daftar Anggota - SIMPUS-Mini" |
| `<link rel="stylesheet" href="../assets/css/style.css">` | Menghubungkan halaman ini dengan file CSS |
| `</head>` | Menutup bagian head |
| `<body>` | Berisi seluruh konten yang ditampilkan pada halaman |
| `<header>`, `<h1>SIMPUS-Mini</h1>` | Bagian atas halaman beserta judul utama aplikasi |
| `<button id="nav-toggle" class="nav-toggle" type="button">&#9776;</button>` | **Berubah signifikan:** tombol hamburger sekarang berupa elemen `<button>` biasa, bukan lagi checkbox tersembunyi. Perilaku buka-tutupnya dikendalikan oleh JavaScript (`initNavToggle()` di `app.js`), bukan murni CSS lagi |
| `<nav>`, `<ul>`, `<li>` | Wadah menu navigasi beserta daftar dan item-item menunya |
| `<a href="../index.html">Beranda</a>` | Tautan menuju halaman Beranda |
| `<a href="../buku/list.html">Daftar Buku</a>` | Tautan menuju halaman Daftar Buku |
| `<a href="../buku/tambah.html">Tambah Buku</a>` | Tautan menuju halaman Tambah Buku |
| `<a href="list.html">Daftar Anggota</a>` | Tautan menuju halaman yang sedang dibuka saat ini |
| `<a href="tambah.html">Tambah Anggota</a>` | Tautan menuju halaman untuk menambah anggota baru |
| `</nav>`, `</header>` | Menutup bagian navigasi dan header |
| `<main>` | Berisi konten utama halaman |
| `<section>` | Mengelompokkan konten daftar anggota |
| `<h2>Daftar Anggota</h2>` | Judul dari bagian ini |
| `<div class="search-box">` | **Baru:** pembungkus untuk kolom pencarian |
| `<input type="text" id="search-input" placeholder="Cari berdasarkan nama anggota...">` | **Baru:** kolom input untuk mencari anggota berdasarkan nama; setiap ketikan pengguna akan memicu fungsi `initTableFilter()` di `app.js` untuk menyaring baris tabel secara langsung |
| `</div>` | Menutup pembungkus pencarian |
| `<p id="table-counter"></p>` | **Baru:** elemen teks kosong yang akan otomatis diisi oleh JavaScript (`updateTableCounter()`) dengan informasi jumlah data yang sedang tampil, misalnya "Menampilkan 10 dari 10 data" |
| `<div class="table-responsive">` | Pembungkus tabel supaya bisa di-scroll horizontal di layar sempit |
| `<table>` | Membuat tabel |
| `<thead><tr><th>...</th></tr></thead>` | Baris judul kolom, yaitu No. Anggota, Nama, Alamat, No. HP, dan Aksi |
| `<tbody>` | Berisi data anggota, terdiri dari 10 baris data (A001–A010) |
| `<tr><td>...</td></tr>` | Satu baris mewakili satu data anggota |
| `<button type="button">Edit</button>` | Tombol Edit, pada tahap ini belum memiliki fungsi |
| `<button type="button">Hapus</button>` | Tombol Hapus — **catatan:** pada halaman ini tombol Hapus belum diberi `class="btn-hapus"`, sehingga fitur konfirmasi hapus dari `app.js` belum akan aktif di halaman ini (berbeda dengan halaman Daftar Buku yang sudah memakainya) |
| `</tbody></table>` | Menutup isi dan tabel |
| `</div>` | Menutup pembungkus `table-responsive` |
| `</section></main>` | Menutup section dan konten utama |
| `<footer>`, `<p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 5</p>` | Bagian bawah halaman beserta teks hak cipta, keterangan jobsheet diperbarui menjadi Jobsheet 5 |
| `</footer></body></html>` | Menutup seluruh elemen halaman — **catatan:** pada dokumen yang diberikan, halaman ini belum menyertakan tag `<script src="../assets/js/app.js"></script>` sebelum `</body>`, padahal halaman lain (`buku/list.html`, `buku/tambah.html`, `index.html`) sudah menyertakannya. Perlu dicek apakah baris ini memang sengaja belum ditambahkan atau tertinggal |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 3/4)

- Ditambahkan fitur pencarian (`.search-box` + `#search-input`) dan penghitung jumlah data (`#table-counter`)
- Tombol hamburger diganti dari checkbox tersembunyi menjadi `<button>` yang dikendalikan JavaScript
- Format judul tab browser dibalik urutannya
- Keterangan footer diperbarui menjadi "Jobsheet 5"

