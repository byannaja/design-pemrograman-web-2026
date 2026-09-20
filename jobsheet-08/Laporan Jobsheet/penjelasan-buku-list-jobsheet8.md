# Penjelasan Kode `buku/list.php` — Daftar Buku (Jobsheet 8)

## Bagian PHP (di Awal File)

| Kode | Penjelasan |
|---|---|
| `session_start();` | Mengaktifkan session, tetap dipakai untuk flash message |
| `require_once '../includes/koneksi.php';` | **Baru:** memuat file koneksi database, sehingga variabel `$pdo` (koneksi PDO) tersedia untuk dipakai di halaman ini. `require_once` memastikan file ini hanya dimuat sekali meskipun dipanggil berulang, dan akan menghentikan program dengan error fatal jika filenya tidak ditemukan (beda dengan `include` yang hanya memberi peringatan) |
| `$flash = $_SESSION['flash'] ?? ''; unset($_SESSION['flash']);` | Mengambil dan menghapus pesan flash dari session, seperti biasa |
| `try { $stmt = $pdo->query("SELECT * FROM buku ORDER BY id DESC"); $daftar_buku = $stmt->fetchAll(PDO::FETCH_ASSOC); } catch (PDOException $e) { ... }` | **Baru:** mengambil seluruh data buku dari database, diurutkan berdasarkan `id` secara menurun (`DESC`, artinya data terbaru muncul paling atas). `fetchAll(PDO::FETCH_ASSOC)` mengubah hasil query menjadi array asosiatif PHP, yang tiap barisnya bisa diakses seperti `$buku['judul']` |
| `catch (PDOException $e) { $daftar_buku = []; $flash = "Gagal memuat data buku: " . $e->getMessage(); }` | Jika query database gagal (misalnya koneksi terputus), `$daftar_buku` diisi array kosong dan pesan errornya ditampilkan lewat variabel `$flash` yang sama dipakai untuk notifikasi |
| `include '../includes/header.php';` | Menyisipkan bagian header halaman (lihat penjelasan terpisah di laporan header/footer) |

## Bagian HTML dengan PHP

| Kode | Penjelasan |
|---|---|
| `<h2>Daftar Buku (PostgreSQL)</h2>` | Judul bagian, kini ditambahkan keterangan "(PostgreSQL)" untuk menegaskan bahwa data sudah berasal dari database sungguhan |
| `<?php if (!empty($flash)): ?> ... <?php endif; ?>` | Menampilkan pesan flash (baik notifikasi sukses maupun pesan error koneksi database) |
| `<a href="tambah.php" ...>+ Tambah Buku Baru</a>` | Tautan menuju halaman Tambah Buku |
| `<?php if (empty($daftar_buku)): ?> <tr><td colspan="7" ...>Belum ada data buku di database.</td></tr> <?php else: ?> ... <?php endif; ?>` | **Baru:** penanganan kondisi ketika tabel `buku` di database masih kosong — ditampilkan satu baris pesan informatif, alih-alih tabel yang benar-benar kosong tanpa keterangan apa pun |
| `<?php foreach ($daftar_buku as $index => $buku): ?>` | Perulangan untuk mencetak tiap baris data, kini juga mengambil `$index` (nomor urut perulangan, dimulai dari 0) |
| `<td><?= htmlspecialchars($index + 1) ?></td>` | **Berubah:** kolom nomor urut kini dihitung dari `$index + 1` (nomor urut tampilan berdasarkan urutan baris), **bukan lagi** dari kolom `no` seperti data lama di Jobsheet 3–7. Ini karena tabel `buku` di database memakai `id` sebagai primary key, bukan kolom `no` |
| `<td><?= htmlspecialchars($buku['judul']) ?></td>` dst | Menampilkan Judul, Pengarang, Tahun, Stok, Kategori dari data yang diambil database |
| `<a href="detail.php?id=<?= $buku['id'] ?>">Detail</a>` | **Berubah:** tautan Detail kini membawa parameter `id` (sesuai primary key tabel `buku`), bukan lagi `no_anggota` atau nomor urut seperti sebelumnya. **Catatan keamanan:** nilai `$buku['id']` di sini **tidak** dibungkus `htmlspecialchars()` — karena `id` berasal dari kolom `SERIAL` (selalu berupa angka murni dari database), risikonya sangat kecil, tapi untuk konsistensi praktik yang aman biasanya tetap dianjurkan membungkus semua output dengan `htmlspecialchars()` |
| **Tombol Edit dan Hapus tidak ada lagi** | Dibandingkan Jobsheet 7, kolom Aksi di tabel ini **hanya menyisakan tautan Detail** — tombol Edit dan Hapus (yang di Jobsheet 7 masih berupa `<button>` tanpa fungsi nyata) sudah dihapus sepenuhnya dari tampilan |
| `<?php include '../includes/footer.php'; ?>` | Menyisipkan bagian footer halaman |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 7)

- Data buku kini diambil dari **database PostgreSQL** lewat query SQL (`SELECT * FROM buku`), bukan lagi dari session PHP
- Ditambahkan penanganan kondisi data kosong (pesan "Belum ada data buku di database")
- Ditambahkan penanganan error koneksi/query database lewat `try-catch`
- Kolom nomor kini dihitung dari urutan tampilan (`$index + 1`), bukan dari data itu sendiri
- Tautan Detail kini memakai `id` (primary key database) sebagai parameter
- **Tombol Edit dan Hapus dihapus** dari tampilan — halaman ini sekarang hanya menyediakan fitur **Read** (baca/lihat) dan **Create** (lewat tautan Tambah), belum ada Update maupun Delete
- Halaman kini memakai `include header.php` dan `include footer.php`, tidak lagi menulis struktur HTML lengkap sendiri

