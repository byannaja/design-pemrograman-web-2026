# Penjelasan Kode `anggota/list.php` — Daftar Anggota (Jobsheet 7)

Di Jobsheet 7, halaman ini berubah dari `.html` menjadi `.php`, dan mulai menggunakan **PHP** untuk mengelola data secara dinamis di sisi server, memakai fitur **session** PHP sebagai penyimpanan data sementara.

## Bagian PHP (di Awal File)

| Kode | Penjelasan |
|---|---|
| `<?php session_start(); ?>` | Mengaktifkan/melanjutkan session PHP — session dipakai untuk menyimpan data yang tetap "diingat" server selama pengguna membuka aplikasi ini, tanpa perlu database sungguhan |
| `$flash = $_SESSION['flash'] ?? '';` | Mengambil pesan "flash" (notifikasi sukses sementara) dari session, jika ada. Jika tidak ada, nilainya diisi string kosong |
| `unset($_SESSION['flash']);` | Menghapus flash message dari session setelah diambil, supaya pesan itu hanya muncul **satu kali** saja (misalnya setelah berhasil menambah anggota baru, lalu di-refresh pesannya tidak muncul lagi) |
| `if (!isset($_SESSION['anggota'])) { $_SESSION['anggota'] = [ ... ]; }` | Jika session `anggota` belum pernah diisi (misalnya ini kunjungan pertama), maka diisi dengan data awal 10 anggota (A001–A010) sebagai data default |
| `$daftar_anggota = $_SESSION['anggota'];` | Menyalin data anggota dari session ke variabel biasa `$daftar_anggota`, supaya lebih mudah dipakai di bagian HTML di bawahnya |

## Bagian HTML dengan PHP

| Kode | Penjelasan |
|---|---|
| `<?php if (!empty($flash)): ?> ... <?php endif; ?>` | Blok kondisi PHP: jika ada pesan flash (tidak kosong), tampilkan kotak notifikasi hijau berisi pesan tersebut |
| `<?= htmlspecialchars($flash) ?>` | `<?= ?>` adalah singkatan dari `<?php echo ?>`, menampilkan nilai variabel. `htmlspecialchars()` mengubah karakter-karakter khusus HTML (seperti `<`, `>`, `&`) menjadi bentuk aman, mencegah celah keamanan **XSS** (Cross-Site Scripting) jika data mengandung kode HTML/JavaScript berbahaya |
| `<a href="tambah.php" style="...">+ Tambah Anggota Baru</a>` | Tombol/tautan menuju halaman Tambah Anggota, gayanya ditulis langsung lewat atribut `style` (inline CSS) |
| `<?php foreach ($daftar_anggota as $anggota): ?> ... <?php endforeach; ?>` | Perulangan PHP: untuk setiap data anggota di array `$daftar_anggota`, satu baris `<tr>` dicetak |
| `<td><?= htmlspecialchars($anggota['no_anggota']) ?></td>` | Menampilkan nomor anggota, dengan `htmlspecialchars()` untuk keamanan |
| `<td><?= htmlspecialchars($anggota['nama']) ?></td>` dst | Menampilkan nama, alamat, dan nomor HP dengan cara yang sama |
| `<a href="detail.php?no_anggota=<?= urlencode($anggota['no_anggota']) ?>">Detail</a>` | Tautan ke halaman detail anggota, membawa parameter `no_anggota` lewat URL. `urlencode()` memastikan nilai parameter aman dimasukkan ke URL (misalnya kalau ada spasi atau karakter khusus) |
| `<a href="edit.php?no_anggota=...">Edit</a>` | Tautan ke halaman edit anggota |
| `<a href="hapus.php?no_anggota=..." onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn-hapus">Hapus</a>` | Tautan untuk menghapus data anggota, dengan konfirmasi lewat `confirm()` bawaan JavaScript di atribut `onclick` — jika pengguna menekan "Batal", `return false` membuat tautan tidak jadi diklik/diikuti |

## Bagian yang Sama Seperti Sebelumnya

- Struktur `<head>`, `<header>`, `<nav>`, `<footer>`, dan pemanggilan `app.js` tetap sama seperti Jobsheet 6, hanya saja tautan navigasi kini menunjuk ke file `.php` (misalnya `list.php`, `tambah.php`) alih-alih `.html`

## Perbedaan dengan Versi Sebelumnya (Jobsheet 6)

- File berubah dari `.html` menjadi `.php`, memungkinkan PHP dijalankan di server
- Data anggota kini disimpan di **session PHP** (`$_SESSION['anggota']`), bukan lagi diambil dari file JSON lewat JavaScript
- Ditambahkan mekanisme **flash message**: notifikasi sukses yang muncul sekali setelah aksi tertentu (misalnya setelah berhasil tambah anggota)
- Ditambahkan tombol "+ Tambah Anggota Baru" yang mengarah ke halaman tambah
- Tombol Aksi kini berupa tautan (`<a>`) ke halaman **Detail, Edit, dan Hapus** yang terpisah, bukan lagi tombol `<button>` tanpa fungsi seperti di jobsheet-jobsheet sebelumnya — ini menandakan aplikasi sudah mulai mengarah ke fungsi CRUD (Create, Read, Update, Delete) yang sesungguhnya
- `<tbody>` tidak lagi kosong menunggu diisi JavaScript — kini langsung diisi PHP lewat `foreach`, sehingga data langsung tampil begitu halaman dimuat (tanpa delay/loading seperti pendekatan `fetch()` di Jobsheet 6)
- Elemen `#table-counter`, `#loading-indicator`, dan kolom pencarian (`search-box`) sudah tidak ada lagi di halaman ini

#