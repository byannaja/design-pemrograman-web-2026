# Penjelasan Kode `assets/css/style.css` (Jobsheet 6)

Struktur dasar (Reset, Header/Navbar, Main Layout, Kartu Statistik, Form, Responsive Breakpoints) sama seperti Jobsheet 5. Bagian di bawah fokus pada penambahan baru untuk mendukung data yang dimuat dari JSON.

## Bagian Baru: Loading & Error (Jobsheet 6)

| Kode | Penjelasan |
|---|---|
| `.loading { text-align: center; padding: 1rem; color: #393e43; font-weight: 600; }` | **Baru:** gaya untuk teks "Memuat data..." yang ditampilkan saat data sedang diambil dari file JSON |
| `.error { display: block; color: #d9534f; font-size: 0.85rem; margin-top: 0.3rem; font-weight: 500; }` | Gaya pesan error validasi form (sudah ada sejak Jobsheet 5) |
| `.error-row { text-align: center; color: #d9534f; font-weight: 600; padding: 1rem; }` | **Baru:** gaya khusus untuk baris tabel yang menampilkan pesan error, misalnya saat data JSON gagal dimuat (baris ini merentang penuh lewat `colspan`) |
| `.loading { ... }` dan `.error-row { ... }` (duplikat di akhir file) | **Catatan:** kedua selector ini ditulis dua kali di file (sekali di bagian "6. Loading & Error", sekali lagi di paling akhir file setelah breakpoint) — aturan yang belakangan akan menimpa yang pertama, jadi ini sebaiknya dirapikan supaya tidak ada duplikasi |

## Bagian Baru: Table Counter

| Kode | Penjelasan |
|---|---|
| `#table-counter { margin-bottom: 0.75rem; font-size: 0.9rem; font-weight: 600; color: #393e43; }` | Gaya untuk teks penghitung jumlah data (sudah ada sejak Jobsheet 5, kini dikelompokkan dalam bagian tersendiri) |

## Bagian Baru: Tabel Data JSON

| Kode | Penjelasan |
|---|---|
| `.table-responsive { width: 100%; overflow-x: auto; }` | **Diperbarui:** aturan `table-responsive` kini ditulis eksplisit dengan `width: 100%` (sebelumnya digabung dengan `pre` dan `.code-responsive` dalam satu selector) |
| `table, th, td, thead, tbody tr:nth-child(even), tbody tr:hover` | Gaya tabel dasar tetap sama seperti versi sebelumnya |

## Bagian Baru: Tombol Aksi Data Dinamis

| Kode | Penjelasan |
|---|---|
| `td button { ... }`, `td button:first-of-type`, `td button:nth-of-type(2)`, `td button.btn-hapus, td button:last-of-type` | Gaya tombol Edit/Detail/Hapus tetap sama seperti Jobsheet 5 |
| `td button:hover { opacity: 0.85; }` | **Baru:** efek transparan sedikit (85%) saat kursor diarahkan ke tombol aksi mana pun di dalam tabel, memberi umpan balik visual bahwa tombol bisa diklik |

## Bagian Lain (Tidak Berubah dari Jobsheet 5)

- Search box (`.search-box`, `#btn-reload`)
- Form (`form p`, `form label`, `form input/select/textarea`, tombol submit)
- Code/Pre (`.code-responsive`, `pre`)
- Footer
- Responsive Breakpoints (481px, 900px, 1400px)

## Perbedaan dengan Versi Sebelumnya (Jobsheet 5)

- Ditambahkan gaya `.loading` dan `.error-row` untuk mendukung proses pengambilan data dari JSON (kondisi sedang memuat dan kondisi gagal memuat)
- Ditambahkan efek `td button:hover { opacity: 0.85; }` untuk memberi umpan balik visual pada tombol aksi
- Class `.table-responsive` kini dituliskan secara eksplisit dengan `width: 100%`, terpisah dari aturan `pre`
- File CSS ini dikelompokkan ulang dengan penomoran bagian yang lebih rapi (13 bagian, dari Reset sampai Responsive Breakpoints)
