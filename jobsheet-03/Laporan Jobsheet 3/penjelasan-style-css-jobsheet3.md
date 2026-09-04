# Penjelasan Kode `assets/css/style.css` (Jobsheet 3 — Mobile First & Responsif)

## 1. Reset & Base
Sama seperti versi sebelumnya: menghapus margin/padding bawaan browser, mengatur `box-sizing: border-box`, font, warna teks/latar dasar, dan gaya tautan (`a`).

## 2. Header & Navbar (Mobile First)

| Kode | Penjelasan |
|---|---|
| `header { position: relative; ... }` | **Baru:** ditambahkan `position: relative` supaya elemen di dalam header (seperti menu saat terbuka) bisa diposisikan relatif terhadap header ini |
| `.nav-toggle { display: none; }` | Checkbox hamburger disembunyikan dari tampilan, hanya dipakai sebagai "saklar" logis, bukan untuk dilihat |
| `.nav-toggle-label { display: block; font-size: 1.6rem; color: #fff; cursor: pointer; order: 99; }` | Ikon hamburger ditampilkan sebagai kotak blok dengan ukuran besar, warna putih, kursor tangan saat dihover, dan `order: 99` membuatnya selalu diletakkan paling akhir di dalam Flexbox header |
| `header nav { display: none; width: 100%; order: 3; margin-top: 1rem; }` | **Default di layar mobile:** menu navigasi disembunyikan (`display: none`), lebar penuh, dan diberi jarak atas — menu baru muncul kalau checkbox dicentang |
| `.nav-toggle:checked ~ nav { display: block; }` | Inti dari checkbox hack: saat checkbox `.nav-toggle` berstatus tercentang (`:checked`), elemen `nav` yang jadi "sibling"-nya (`~`) otomatis ditampilkan (`display: block`) |
| `header nav ul { ...; flex-direction: column; gap: 0.75rem; }` | Di layar mobile, daftar menu ditumpuk vertikal ke bawah (`flex-direction: column`) dengan jarak antar menu |
| `header nav a { color: #fff; font-weight: 500; }` | Tautan menu berwarna putih dan sedikit tebal |

## 3. Main Layout & Sections
Sama seperti sebelumnya: `main` diberi jarak dan lebar penuh (`width: 100%`) sebagai default mobile, `section` diberi latar putih, sudut membulat, dan bayangan tipis seperti kartu.

## 4. Kartu Statistik (Mobile Default: 1 Kolom)

| Kode | Penjelasan |
|---|---|
| `.stats-container { display: grid; grid-template-columns: 1fr; gap: 1rem; }` | **Berbeda dari versi sebelumnya:** di layar mobile, kartu ringkasan (Total Buku, Total Anggota, dst) ditampilkan 1 kolom saja (menumpuk ke bawah), baru berubah jadi beberapa kolom di layar yang lebih lebar lewat media query |
| Gaya `article`, `h3`, `p` di dalamnya | Sama seperti sebelumnya: latar biru muda, sudut membulat, teks rata tengah, angka besar dan tebal |

## 5. Tabel & Form

| Kode | Penjelasan |
|---|---|
| `table`, `th`, `td`, `thead`, `tbody tr:nth-child(even)`, `tbody tr:hover` | Sama seperti versi sebelumnya: tabel selebar penuh, header hitam-putih, efek zebra stripe, dan highlight saat baris di-hover |
| `td button:first-of-type { background-color: #f0ad4e; }` | Tombol pertama (Edit) tetap berwarna oranye |
| `td button:nth-of-type(2) { background-color: #2c362c; color: #fff; }` | **Baru:** tombol kedua (misalnya "Detail" pada tabel buku) diberi warna hijau tua gelap, untuk membedakan dari tombol Edit dan Hapus |
| `td button:last-of-type { background-color: #d9534f; }` | Tombol terakhir (Hapus) tetap berwarna merah |
| `form input, form select { width: 100%; ... }` | Input dan dropdown form dibuat selebar penuh sebagai default mobile (tanpa `max-width` di sini — lebar maksimalnya baru diatur lewat media query) |

## 6. Container Responsif (Tabel & Kode)

| Kode | Penjelasan |
|---|---|
| `.table-responsive, .code-responsive, pre { overflow-x: auto; max-width: 100%; }` | **Baru:** class ini membuat kontennya (tabel atau blok kode) bisa di-scroll ke samping kalau lebih lebar dari layar, sehingga tidak merusak tata letak halaman di perangkat kecil |
| `pre { background-color: #272822; color: #f8f8f2; ...; font-family: monospace; }` | **Baru:** gaya untuk menampilkan blok kode (`<pre>`) dengan tema gelap ala editor kode, huruf monospace, dan bisa di-scroll horizontal |

## 7. Footer
Sama seperti sebelumnya: teks rata tengah, warna abu gelap, ukuran teks lebih kecil.

## 8. Responsive Breakpoints (Mobile-First)

Bagian ini yang menjadikan CSS ini benar-benar responsif, disusun dengan pendekatan **mobile-first**: gaya default ditulis untuk layar kecil dulu, lalu ditimpa/diperluas untuk layar yang lebih besar lewat `@media (min-width: ...)`.

| Breakpoint | Penjelasan |
|---|---|
| `@media (min-width: 481px)` (Tablet) | Kartu statistik berubah dari 1 kolom menjadi 2 kolom (`repeat(2, 1fr)`); lebar maksimal input form dibatasi 400px supaya tidak terlalu melebar di layar sedang |
| `@media (min-width: 900px)` (Tablet lebar / Desktop) | Ikon hamburger disembunyikan (`.nav-toggle-label { display: none; }`) karena di layar lebar menu langsung ditampilkan mendatar; `header nav` dipaksa tampil (`display: block`) dan disusun horizontal (`flex-direction: row`); kartu statistik berubah jadi 4 kolom; lebar `main` dibatasi maksimal 1000px |
| `@media (min-width: 1400px)` (Monitor sangat lebar) | Lebar maksimal `main` diperlebar lagi menjadi 1300px, supaya konten tidak terlihat terlalu sempit di layar monitor besar |
