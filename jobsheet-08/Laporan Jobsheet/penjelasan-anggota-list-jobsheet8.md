# Penjelasan Kode `anggota/list.php` — Daftar Anggota (Jobsheet 8)

## Bagian PHP (di Awal File)

| Kode | Penjelasan |
|---|---|
| `session_start(); require_once '../includes/koneksi.php';` | Mengaktifkan session dan memuat koneksi database |
| `$flash = $_SESSION['flash'] ?? ''; unset($_SESSION['flash']);` | Mengambil dan menghapus pesan flash |
| `try { $stmt = $pdo->query("SELECT * FROM anggota ORDER BY no_anggota ASC"); $daftar_anggota = $stmt->fetchAll(PDO::FETCH_ASSOC); } catch (PDOException $e) { ... }` | Mengambil seluruh data anggota dari database, diurutkan berdasarkan `no_anggota` secara menaik (`ASC`, dari A001 ke seterusnya) |
| `catch (PDOException $e) { $daftar_anggota = []; $flash = "Gagal memuat data anggota: " . $e->getMessage(); }` | Jika query gagal, tampilkan array kosong dan pesan error |
| `include '../includes/header.php';` | Menyisipkan header halaman |

## Bagian HTML dengan PHP

| Kode | Penjelasan |
|---|---|
| `<h2>Daftar Anggota (PostgreSQL)</h2>` | Judul bagian, ditambahkan keterangan "(PostgreSQL)" |
| `<?php if (!empty($flash)): ?> ... <?php endif; ?>` | Menampilkan pesan flash (sukses maupun error) |
| `<a href="tambah.php" ...>+ Tambah Anggota Baru</a>` | Tautan menuju halaman Tambah Anggota |
| `<?php if (empty($daftar_anggota)): ?> <tr><td colspan="5" ...>Belum ada data anggota di database.</td></tr> <?php else: ?> ... <?php endif; ?>` | Penanganan kondisi data kosong, sama seperti halaman Daftar Buku |
| `<?php foreach ($daftar_anggota as $anggota): ?>` | Perulangan mencetak baris data — **catatan:** di sini **tidak** memakai `$index` seperti di halaman buku, karena kolom "No Anggota" langsung memakai nilai `no_anggota` dari database, bukan nomor urut tampilan |
| `<td><?= htmlspecialchars($anggota['no_anggota']) ?></td>` | Menampilkan No Anggota |
| `<td><?= htmlspecialchars($anggota['nama']) ?></td>` dst | Menampilkan Nama, Alamat, No HP |
| `<a href="detail.php?no_anggota=<?= urlencode($anggota['no_anggota']) ?>">Detail</a>` | Tautan Detail, membawa parameter `no_anggota` (bukan `id`, karena tabel `anggota` memang memakai `no_anggota` sebagai primary key, bukan kolom `id` otomatis seperti tabel `buku`). Nilainya dibungkus `urlencode()` untuk keamanan URL |
| **Tombol Edit dan Hapus tidak ada lagi** | Sama seperti halaman Daftar Buku, kolom Aksi di sini juga hanya menyisakan tautan Detail |
| `<?php include '../includes/footer.php'; ?>` | Menyisipkan footer halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 7)

- Data anggota kini diambil dari **database PostgreSQL** (`SELECT * FROM anggota`), bukan lagi dari session PHP
- Ditambahkan penanganan kondisi data kosong dan error koneksi/query database
- **Tombol Edit dan Hapus dihapus** dari tampilan — sama seperti modul Buku, halaman ini sekarang murni Read + tautan ke Create
- Halaman kini memakai `include header.php` dan `include footer.php`

