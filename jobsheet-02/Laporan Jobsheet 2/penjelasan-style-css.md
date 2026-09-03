# Penjelasan Kode `assets/css/style.css`

## Reset & Base

| Kode | Penjelasan |
|---|---|
| `* { box-sizing: border-box; margin: 0; padding: 0; }` | Reset dasar untuk semua elemen: `box-sizing: border-box` bikin perhitungan lebar/tinggi elemen sudah termasuk padding dan border, sementara `margin` dan `padding` di-nol-kan supaya tidak ada jarak bawaan browser yang bikin tampilan tidak konsisten |
| `body { font-family: ...; color: #302d2d; background-color: #f5f6f8; line-height: 1.5; }` | Mengatur tampilan dasar halaman: jenis huruf (Segoe UI/Arial), warna teks abu gelap, warna latar abu terang, dan jarak antar baris teks |
| `a { color: #000000; text-decoration: none; }` | Semua tautan berwarna hitam dan tidak bergaris bawah secara default |
| `a:hover { text-decoration: underline; }` | Saat kursor diarahkan ke tautan, muncul garis bawah sebagai penanda interaktif |

## Header & Navbar (Flexbox)

| Kode | Penjelasan |
|---|---|
| `header { background-color: #00000089; color: #fff; padding: 1rem 1.5rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; }` | Header diberi latar hitam semi-transparan (`89` di akhir kode warna adalah nilai transparansi), teks putih, dan diatur pakai Flexbox agar judul dan menu sejajar dengan jarak merata; `flex-wrap: wrap` membuat isi header turun ke baris baru jika layar terlalu sempit |
| `header h1 { font-size: 1.4rem; }` | Ukuran judul "SIMPUS-Mini" di header |
| `header nav ul { list-style: none; display: flex; gap: 1.25rem; }` | Daftar menu navigasi dihilangkan tanda bulatnya (`list-style: none`) dan disusun sejajar ke samping (`display: flex`) dengan jarak antar menu |
| `header nav a { color: #fff; font-weight: 500; }` | Tautan menu di header berwarna putih dan sedikit tebal |

## Main Layout

| Kode | Penjelasan |
|---|---|
| `main { max-width: 1000px; margin: 2rem auto; padding: 0 1.5rem; }` | Konten utama dibatasi lebar maksimal 1000px dan diposisikan di tengah halaman (`margin: auto`) |
| `section { background-color: #fff; border-radius: 8px; padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: ...; }` | Setiap section diberi latar putih, sudut membulat, jarak dalam, jarak bawah antar section, serta bayangan tipis supaya terlihat seperti kartu |
| `section h2 { margin-bottom: 1rem; color: #000000; }` | Judul di dalam section diberi jarak bawah dan warna hitam |

## Kartu Statistik (CSS Grid)

| Kode | Penjelasan |
|---|---|
| `.stats-container { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; }` | Class ini mengatur pembungkus kartu ringkasan (di halaman Beranda) memakai CSS Grid dengan 4 kolom yang lebarnya sama rata, plus jarak antar kartu |
| `.stats-container article { background-color: #eef4fa; border-radius: 8px; padding: 1.25rem; text-align: center; }` | Tiap kartu (Total Buku, Total Anggota, Sedang Dipinjam) diberi latar biru muda, sudut membulat, jarak dalam, dan teks rata tengah |
| `.stats-container article h3 { font-size: 0.95rem; color: #393e44; margin-bottom: 0.5rem; }` | Judul kecil di tiap kartu (misalnya "Total Buku") diberi ukuran, warna, dan jarak bawah |
| `.stats-container article p { font-size: 1.8rem; font-weight: 700; color: #000000; }` | Angka besar di tiap kartu (misalnya "12") ditampilkan besar dan tebal supaya menonjol |

## Tabel

| Kode | Penjelasan |
|---|---|
| `table { width: 100%; border-collapse: collapse; }` | Tabel dibuat selebar penuh dan garis-garis selnya digabung jadi satu garis tipis (tidak dobel) |
| `th, td { text-align: left; padding: 0.65rem 0.75rem; border-bottom: 1px solid #e2e6ea; }` | Sel header dan data rata kiri, punya jarak dalam, dan garis pemisah tipis di bagian bawah tiap baris |
| `thead { background-color: #000000; color: #fff; }` | Baris judul kolom (header tabel) diberi latar hitam dan teks putih |
| `tbody tr:nth-child(even) { background-color: #f7f9fb; }` | Baris data bernomor genap diberi warna latar sedikit abu, membuat tabel jadi belang-belang (efek "zebra stripe") supaya lebih mudah dibaca |
| `tbody tr:hover { background-color: #eef4fa; }` | Saat kursor diarahkan ke sebuah baris data, latarnya berubah jadi biru muda sebagai penanda |
| `td button { padding: ...; margin-right: 0.35rem; border: none; border-radius: 4px; cursor: pointer; font-size: 0.85rem; }` | Gaya dasar untuk tombol Edit/Hapus di dalam tabel: jarak dalam, jarak antar tombol, tanpa garis tepi, sudut membulat, dan kursor berubah jadi tangan saat dihover |
| `td button:first-of-type { background-color: #f0ad4e; color: #fff; }` | Tombol pertama di tiap baris (Edit) diberi warna oranye |
| `td button:nth-of-type(2) { background-color: #2c362c; color: #fff; }` | Tombol kedua di tiap baris (Detail) diberi warna abu abu |
| `td button:last-of-type { background-color: #d9534f; color: #fff; }` | Tombol terakhir di tiap baris (Hapus) diberi warna merah |

## Form

| Kode | Penjelasan |
|---|---|
| `form p { margin-bottom: 1rem; }` | Tiap `<p>` yang membungkus label+input di form diberi jarak bawah, supaya antar kolom form tidak terlalu rapat |
| `form label { display: block; margin-bottom: 0.35rem; font-weight: 600; color: #444; }` | Label form ditampilkan sebagai blok (otomatis pindah baris), diberi jarak bawah kecil, dan teksnya agak tebal |
| `form input, form select { width: 100%; max-width: 400px; padding: ...; border: 1px solid #cdd4da; border-radius: 4px; font-size: 1rem; }` | Kolom input dan dropdown dibuat selebar penuh (maksimal 400px), diberi jarak dalam, garis tepi tipis, sudut membulat, dan ukuran teks yang nyaman dibaca |
| `form button[type="submit"] { background-color: #393f44; color: #fff; border: none; padding: ...; border-radius: 4px; font-size: 1rem; cursor: pointer; }` | Tombol submit (Simpan) diberi latar abu gelap, teks putih, sudut membulat, dan kursor tangan |
| `form button[type="submit"]:hover { background-color: #000000; }` | Saat tombol Simpan dihover, warnanya berubah jadi hitam pekat sebagai efek interaktif |

## Footer

| Kode | Penjelasan |
|---|---|
| `footer { text-align: center; padding: 1.25rem; color: #393e43; font-size: 0.9rem; }` | Footer diberi teks rata tengah, jarak dalam, warna abu gelap, dan ukuran teks yang lebih kecil dari teks biasa |
