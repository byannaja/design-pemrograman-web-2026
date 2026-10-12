# Penjelasan Kode `index.php` — Beranda (Jobsheet 8)

| Kode | Penjelasan |
|---|---|
| `require_once 'includes/koneksi.php';` | **Baru:** memuat koneksi database. **Catatan:** file ini **tidak** memanggil `session_start()` seperti halaman-halaman lain — kemungkinan karena halaman Beranda memang tidak butuh mengakses/mengubah data session apa pun |
| `try { $stmtBuku = $pdo->query("SELECT COUNT(*) FROM buku"); $totalBuku = $stmtBuku->fetchColumn(); ... } catch (PDOException $e) { $totalBuku = 0; $totalAnggota = 0; }` | **Baru — perubahan penting:** menghitung **jumlah total baris** di tabel `buku` dan `anggota` langsung dari database memakai `COUNT(*)`, lalu `fetchColumn()` mengambil satu nilai hasil hitungan tersebut. Jika terjadi error, kedua nilai diset ke 0 sebagai fallback |
| `<title>SIMPUS-Mini - Beranda</title>` | Judul tab browser |
| `include __DIR__ . '/includes/header.php'` | Memakai header bersama dengan menu hamburger responsif, sekaligus menandai Dashboard sebagai menu aktif |
| `<h2>Selamat Datang di Sistem Perpustakaan Mini</h2>` | Judul sambutan |
| `<p>Data saat ini telah terhubung secara permanen menggunakan database PostgreSQL.</p>` | **Berubah:** deskripsi aplikasi diperbarui untuk menyebutkan bahwa data kini tersambung secara permanen ke PostgreSQL |
| `<h2>Ringkasan Statistik</h2>` | Judul bagian ringkasan, sedikit diubah dari "Ringkasan" menjadi "Ringkasan Statistik" |
| `<div class="stats-container" style="display: flex; gap: 20px; margin-top: 15px;">` | **Berubah:** pembungkus kartu statistik kini diberi gaya tambahan langsung lewat atribut `style` (inline), memaksa tampilan jadi flex row dengan jarak antar kartu — ini menimpa/duplikat dengan gaya `.stats-container` yang sudah didefinisikan di `style.css` (yang seharusnya sudah mengatur `display: grid`) |
| `<article style="border: 1px solid #ccc; padding: 15px; border-radius: 5px; min-width: 150px;">` | Kartu statistik, kini juga diberi gaya inline tambahan (garis tepi, dsb), berbeda dari gaya `.stats-container article` yang sudah ada di `style.css` |
| `<h3>Total Buku</h3>` dan `<p style="font-size: 1.5rem; font-weight: bold;"><?= $totalBuku ?></p>` | **Berubah signifikan:** angka Total Buku kini **dihitung otomatis** dari database (`$totalBuku`), tidak lagi ditulis statis seperti jobsheet-jobsheet sebelumnya |
| `<h3>Total Anggota</h3>` dan `<p style="...">​<?= $totalAnggota ?></p>` | Angka Total Anggota juga kini dihitung otomatis dari database |
| **Kartu "Sedang Dipinjam" dan "Buku Terlambat" sudah tidak ada** | Dibandingkan Jobsheet 3–7, kedua kartu statistik ini **dihapus** dari halaman Beranda — kemungkinan karena datanya memang belum tersedia di database (belum ada tabel peminjaman) |
| `include __DIR__ . '/includes/footer.php'` | Menutup layout bersama dan memuat JavaScript untuk menu mobile serta pencarian tabel barang |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 7)

- **Angka Total Buku dan Total Anggota kini dihitung otomatis** dari database lewat `COUNT(*)` — ini melengkapi catatan/saran yang muncul di laporan Jobsheet 7 sebelumnya, yang menyarankan angka-angka ini seharusnya dihitung otomatis, bukan statis
- Kartu **"Sedang Dipinjam"** dan **"Buku Terlambat"** dihapus dari tampilan, karena datanya belum tersedia di struktur database saat ini
- Deskripsi aplikasi diperbarui untuk menyebutkan koneksi database PostgreSQL
- Dashboard memakai layout bersama; kolom pencarian menyaring data barang yang ditampilkan tanpa memuat ulang halaman
