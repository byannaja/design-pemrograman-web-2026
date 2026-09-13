# Penjelasan Kode `assets/css/style.css` (Jobsheet 5)

Struktur dasar file ini (Reset, Header/Navbar, Main Layout, Kartu Statistik, Tabel, Footer, Responsive Breakpoints) sama seperti versi Jobsheet 3/4. Bagian di bawah ini fokus menjelaskan aturan-aturan **baru** yang ditambahkan pada Jobsheet 5, untuk mendukung fitur pencarian dan validasi form lewat JavaScript.

## Bagian Baru: Kontrol Baris, Tabel & Form

| Kode | Penjelasan |
|---|---|
| `.search-box { display: flex; gap: 0.5rem; align-items: center; margin-bottom: 1rem; }` | **Baru:** gaya untuk pembungkus kolom pencarian, disusun mendatar (flex) dengan jarak antar elemen dan jarak bawah |
| `.search-box input { width: 100%; max-width: 320px; padding: 0.55rem 0.7rem; border: 1px solid #cdd4da; border-radius: 4px; font-size: 0.9rem; }` | **Baru:** gaya kolom input pencarian — lebar penuh dengan batas maksimal 320px, ada garis tepi dan sudut membulat |
| `#btn-reload { padding: 0.55rem 1rem; background-color: #393f44; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 0.9rem; }` | **Baru:** gaya untuk tombol reload/muat ulang (disiapkan di CSS, meskipun elemen `#btn-reload` belum tentu dipakai di semua halaman) |
| `#btn-reload:hover { background-color: #000000; }` | Warna tombol reload berubah jadi hitam pekat saat di-hover |
| `#table-counter { margin-bottom: 0.75rem; font-size: 0.9rem; font-weight: 600; color: #393e43; }` | **Baru:** gaya untuk teks penghitung jumlah data (misalnya "Menampilkan 3 dari 10 data") yang dikendalikan oleh `app.js` |

## Penyesuaian pada Tabel

| Kode | Penjelasan |
|---|---|
| `td button.btn-hapus, td button:last-of-type { background-color: #d9534f; color: #fff; }` | **Diperbarui:** selector ditambah `td button.btn-hapus` supaya tombol Hapus tetap berwarna merah meskipun urutannya di dalam kolom Aksi berubah-ubah (tidak selalu jadi tombol terakhir). Sebelumnya hanya mengandalkan `:last-of-type` |

## Penyesuaian pada Form

| Kode | Penjelasan |
|---|---|
| `form input, form select, form textarea { width: 100%; padding: ...; border: 1px solid #cdd4da; border-radius: 4px; font-size: 1rem; outline: none; }` | **Diperbarui:** ditambahkan elemen `textarea` supaya ikut mendapat gaya yang sama dengan input dan select; ditambahkan `outline: none` untuk menghilangkan garis fokus bawaan browser |
| `form input:focus, form select:focus, form textarea:focus { border-color: #000000; }` | **Baru:** saat kolom input sedang aktif diisi (fokus), garis tepinya berubah warna jadi hitam sebagai penanda visual |
| `.error { display: block; color: #d9534f; font-size: 0.85rem; margin-top: 0.3rem; font-weight: 500; }` | **Baru:** gaya untuk pesan error validasi yang dimunculkan lewat JavaScript (fungsi `tampilkanError` di `app.js`) — teks merah, ukuran kecil, ditampilkan di bawah input yang bermasalah |

## Bagian Lain (Tidak Berubah)

- Reset & Base, Header/Navbar, Main Layout, Kartu Statistik, Container Responsif (`table-responsive`), Footer, dan Responsive Breakpoints tetap sama seperti versi Jobsheet 3/4

## Perbedaan dengan Versi Sebelumnya (Jobsheet 3/4)

- Ditambahkan gaya untuk fitur baru: kolom pencarian (`.search-box`), tombol reload (`#btn-reload`), penghitung data (`#table-counter`), dan pesan error validasi (`.error`)
- Selector tombol Hapus diperkuat dengan class `.btn-hapus`, bukan hanya mengandalkan urutan tombol (`:last-of-type`)
- Elemen `textarea` ikut ditambahkan ke gaya form, dan ditambahkan efek visual saat input sedang difokus (`:focus`)
