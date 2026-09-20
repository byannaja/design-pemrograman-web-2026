# Penjelasan Kode `buku/list.php` — Daftar Buku (Jobsheet 7)

## Bagian PHP (di Awal File)

| Kode | Penjelasan |
|---|---|
| `<?php session_start(); ?>` | Mengaktifkan session PHP |
| `$flash = $_SESSION['flash'] ?? '';` dan `unset($_SESSION['flash']);` | Mengambil dan menghapus pesan flash dari session, sama seperti halaman anggota |
| `if (!isset($_SESSION['buku'])) { $_SESSION['buku'] = [ ... ]; }` | Jika session `buku` belum ada, diisi dengan 10 data buku awal (sama dengan data yang sebelumnya ada di `buku.json` pada Jobsheet 6) |
| `$daftar_buku = $_SESSION['buku'];` | Menyalin data buku dari session ke variabel `$daftar_buku` untuk dipakai di HTML |

## Bagian HTML dengan PHP

| Kode | Penjelasan |
|---|---|
| `<?php if (!empty($flash)): ?> ... <?php endif; ?>` | Menampilkan notifikasi sukses (misalnya setelah berhasil menambah buku baru) jika ada pesan flash |
| `<a href="tambah.php" style="...">+ Tambah Buku Baru</a>` | Tombol/tautan menuju halaman Tambah Buku |
| `<?php foreach ($daftar_buku as $buku): ?> ... <?php endforeach; ?>` | Perulangan PHP untuk mencetak satu baris tabel per data buku |
| `<td><?= htmlspecialchars($buku['no']) ?></td>` dst | Menampilkan No, Judul, Pengarang, Tahun, Stok, dan Kategori, masing-masing dengan `htmlspecialchars()` untuk keamanan |
| `<button type="button">Edit</button>` | Tombol Edit — **catatan:** berbeda dengan halaman anggota, tombol ini masih berupa `<button>` biasa tanpa `href`, belum terhubung ke halaman edit buku manapun, jadi belum memiliki fungsi nyata |
| `<button type="button" class="btn-hapus">Hapus</button>` | Tombol Hapus, diberi `class="btn-hapus"` supaya terdeteksi `initHapusConfirm()` di `app.js` — namun karena ini `<button>` tanpa `href` (bukan tautan ke `hapus.php`), klik tombol ini **hanya menghapus baris secara visual**, tidak benar-benar menghapus data dari session |

## Bagian yang Sama Seperti Sebelumnya

- `<head>`, `<header>`, `<nav>`, `<footer>`, dan pemanggilan `app.js` sama seperti Jobsheet 6, dengan tautan navigasi kini menunjuk ke file `.php`

## Perbedaan dengan Versi Sebelumnya (Jobsheet 6)

- File berubah dari `.html` menjadi `.php`
- Data buku kini disimpan di session PHP (`$_SESSION['buku']`), bukan lagi diambil dari `buku.json` lewat `fetch()`
- Ditambahkan mekanisme flash message dan tombol "+ Tambah Buku Baru"
- `<tbody>` langsung diisi PHP lewat `foreach`, tidak lagi kosong menunggu JavaScript
- Elemen `#table-counter`, `#loading-indicator`, kolom pencarian, dan tombol Muat Ulang sudah **tidak ada lagi** di halaman ini
- Tombol **Detail** (yang ada sejak Jobsheet 3) sudah **dihapus** dari tabel ini

