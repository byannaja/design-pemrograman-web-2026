# Penjelasan Kode `anggota/tambah.php` & `anggota/proses_tambah.php` (Jobsheet 8)

**Catatan:** file `anggota/tambah.php` (form) tidak disertakan secara eksplisit dalam pesan ini, hanya `anggota/proses_tambah.php` yang diberikan. Penjelasan di bawah berfokus pada file pemroses tersebut, dengan asumsi form `tambah.php`-nya mengikuti pola serupa `buku/tambah.php` (memakai `$flash` untuk pesan, field `no_anggota`, `nama`, `alamat`, `no_hp`).

## `anggota/proses_tambah.php` — Pemroses Form

| Kode | Penjelasan |
|---|---|
| `session_start(); require_once '../includes/koneksi.php';` | Mengaktifkan session dan memuat koneksi database |
| `if ($_SERVER['REQUEST_METHOD'] === 'POST') { ... }` | Memproses hanya jika diakses lewat metode POST |
| `$no_anggota = $_POST['no_anggota'] ?? '';` dst | Mengambil nilai No. Anggota, Nama, Alamat, No. HP dari form — **tanpa** `trim()`, sama seperti modul Buku |
| `try { $sql = "INSERT INTO anggota (no_anggota, nama, alamat, no_hp) VALUES (:no_anggota, :nama, :alamat, :no_hp)"; $stmt = $pdo->prepare($sql); $stmt->execute([...]); ... } catch (PDOException $e) { ... }` | Menyusun dan menjalankan perintah `INSERT` memakai **prepared statement**, sama seperti modul Buku — mencegah SQL Injection |
| `$_SESSION['flash'] = "Anggota baru berhasil didaftarkan!"; header('Location: list.php'); exit;` | Jika berhasil, tampilkan pesan sukses dan arahkan ke Daftar Anggota |
| `catch (PDOException $e) { if ($e->getCode() == '23505') { $_SESSION['flash'] = "Nomor Anggota '{$no_anggota}' sudah dipakai, silakan gunakan nomor lain."; } else { $_SESSION['flash'] = "Terjadi kesalahan pada database: " . $e->getMessage(); } header('Location: tambah.php'); exit; }` | **Bagian paling menarik di file ini:** penanganan error yang **lebih spesifik** dibanding modul Buku. Kode error `'23505'` adalah kode standar PostgreSQL untuk pelanggaran batasan **UNIQUE** (termasuk primary key yang duplikat). Karena `no_anggota` adalah primary key tabel `anggota`, jika pengguna mencoba mendaftarkan nomor anggota yang **sudah ada**, PostgreSQL akan menolak dan melempar error dengan kode ini — lalu kode PHP di sini secara khusus mendeteksinya dan menampilkan pesan yang **ramah dan jelas** ("Nomor Anggota 'A001' sudah dipakai...") alih-alih pesan error teknis mentah dari database |

## Alur Kerja Keseluruhan

1. Pengguna mengisi form Tambah Anggota, menekan Simpan
2. Data dikirim ke `proses_tambah.php`
3. Dicoba disimpan lewat `INSERT INTO anggota ...`
4. Jika berhasil → pesan sukses, diarahkan ke `list.php`
5. Jika gagal karena nomor anggota duplikat (kode error `23505`) → pesan spesifik yang menjelaskan penyebabnya
6. Jika gagal karena sebab lain → pesan error umum dari database

## Perbedaan dengan Versi Sebelumnya (Jobsheet 7)

- Data anggota baru kini benar-benar disimpan ke **database PostgreSQL**, bukan lagi ke session
- Memakai **prepared statement** untuk keamanan
- **Validasi manual PHP dihapus:** validasi "semua field wajib diisi" dan validasi format No. HP dengan `preg_match()` yang ada di Jobsheet 7 **sudah tidak ada lagi** di versi ini — kini hanya mengandalkan atribut `required` di HTML (form) dan aturan `NOT NULL` di tabel database
- **Ditambahkan penanganan error duplikat** (kode `23505`) yang lebih informatif — fitur baru yang **belum ada** di Jobsheet 7, karena di Jobsheet 7 data disimpan sebagai array session biasa tanpa aturan keunikan yang ditegakkan otomatis

