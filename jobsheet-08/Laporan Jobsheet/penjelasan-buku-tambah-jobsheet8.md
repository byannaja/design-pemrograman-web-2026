# Penjelasan Kode `buku/tambah.php` & `buku/proses_tambah.php` (Jobsheet 8)

## `buku/tambah.php` — Halaman Form

| Kode | Penjelasan |
|---|---|
| `session_start();` | Mengaktifkan session |
| `$flash = $_SESSION['flash'] ?? ''; unset($_SESSION['flash']);` | **Berubah:** di Jobsheet 8, halaman form ini memakai variabel `$flash` (bukan lagi `$error` dan `$old` yang terpisah seperti Jobsheet 7) untuk menampilkan pesan — baik pesan sukses maupun pesan gagal ditampilkan lewat mekanisme yang sama |
| `include '../includes/header.php';` | Menyisipkan header halaman |
| `<h2>Tambah Buku Baru</h2>` | Judul bagian |
| `<?php if (!empty($flash)): ?> <div class="flash-message" style="background-color: #f2dede; color: #a94442; ..."> <?= htmlspecialchars($flash) ?> </div> <?php endif; ?>` | Menampilkan kotak pesan (dengan warna merah muda, gaya untuk pesan error) jika ada pesan flash — misalnya jika sebelumnya gagal menyimpan data |
| `<form action="proses_tambah.php" method="POST" style="max-width: 500px;">` | Form mengirim data lewat POST ke `proses_tambah.php`, dengan lebar maksimal 500px |
| `<label>Judul Buku:</label><br><input type="text" name="judul" required style="...">` | Kolom input Judul Buku, wajib diisi |
| `<label>Pengarang:</label><br><input type="text" name="pengarang" required style="...">` | Kolom input Pengarang, wajib diisi |
| `<label>Tahun Terbit:</label><br><input type="number" name="tahun" required style="...">` | Kolom input Tahun Terbit — **catatan:** tidak lagi memakai atribut `min="1900" max="2026"` seperti versi-versi sebelumnya, jadi pembatasan rentang tahun di sisi HTML sudah tidak ada |
| `<label>Stok:</label><br><input type="number" name="stok" required style="...">` | Kolom input Stok — **catatan:** atribut `min="0"` juga sudah tidak ada di versi ini |
| `<label>Kategori:</label><br><input type="text" name="kategori" required style="...">` | Kolom input Kategori berupa teks bebas |
| `<button type="submit" style="...">Simpan Buku</button>` | Tombol untuk mengirim form |
| `<a href="list.php" style="...">Batal</a>` | **Baru:** tautan "Batal" yang mengarah kembali ke halaman Daftar Buku tanpa menyimpan apa pun |
| `<?php include '../includes/footer.php'; ?>` | Menyisipkan footer halaman |

**Catatan penting mengenai fitur "isi ulang form":** Berbeda dengan Jobsheet 7 yang menyimpan `$_SESSION['old']` supaya form tetap terisi kembali kalau validasi gagal, form Jobsheet 8 ini **tidak lagi memiliki fitur tersebut** — setiap kali diarahkan kembali ke halaman ini (misalnya karena gagal simpan), semua kolom form akan **kosong kembali**, memaksa pengguna mengetik ulang dari awal.

## `buku/proses_tambah.php` — Pemroses Form

| Kode | Penjelasan |
|---|---|
| `session_start(); require_once '../includes/koneksi.php';` | Mengaktifkan session dan memuat koneksi database |
| `if ($_SERVER['REQUEST_METHOD'] === 'POST') { ... }` | Memproses hanya jika diakses lewat metode POST |
| `$judul = $_POST['judul'] ?? '';` dst | Mengambil nilai dari form. **Catatan:** berbeda dari Jobsheet 7, di sini nilainya **tidak lagi diproses dengan `trim()`**, sehingga spasi berlebih di awal/akhir input (jika ada) tidak dibersihkan |
| `try { $sql = "INSERT INTO buku (judul, pengarang, tahun, stok, kategori) VALUES (:judul, :pengarang, :tahun, :stok, :kategori)"; $stmt = $pdo->prepare($sql); $stmt->execute([...]); ... } catch (PDOException $e) { ... }` | **Baru — bagian paling penting:** menyusun perintah SQL `INSERT` untuk memasukkan data baru ke tabel `buku`, memakai **prepared statement** (`$pdo->prepare()` + `$stmt->execute()`) dengan **parameter berlabel** (`:judul`, `:pengarang`, dst) |
| `$_SESSION['flash'] = "Buku berhasil ditambahkan ke database!"; header('Location: list.php'); exit;` | Jika berhasil, tampilkan pesan sukses dan arahkan ke Daftar Buku |
| `catch (PDOException $e) { $_SESSION['flash'] = "Gagal menambah buku: " . $e->getMessage(); header('Location: tambah.php'); exit; }` | Jika gagal (misalnya karena masalah koneksi atau data tidak sesuai aturan tabel), tampilkan pesan error dan arahkan kembali ke form |

**Mengapa memakai *prepared statement* (`:judul`, dst)?** Ini adalah cara yang **aman** untuk memasukkan data dari pengguna ke dalam query SQL. Dengan pendekatan ini, PDO secara otomatis memisahkan perintah SQL dari data yang dimasukkan pengguna, sehingga mencegah serangan **SQL Injection** — yaitu upaya jahat memanipulasi query database dengan menyisipkan kode SQL berbahaya lewat input form (misalnya kalau field Judul diisi teks yang mengandung sintaks SQL aneh-aneh, ia tetap akan diperlakukan murni sebagai teks judul, bukan dieksekusi sebagai perintah SQL).

## Alur Kerja Keseluruhan

1. Pengguna membuka `tambah.php`, mengisi form, menekan Simpan
2. Data dikirim ke `proses_tambah.php`
3. `proses_tambah.php` mencoba menyimpan data ke database lewat `INSERT`
4. Jika berhasil → pesan sukses, arahkan ke `list.php` (data baru akan langsung terlihat karena `list.php` mengambil data terbaru dari database)
5. Jika gagal → pesan error, arahkan kembali ke `tambah.php` (namun form akan kosong lagi)

## Perbedaan dengan Versi Sebelumnya (Jobsheet 7)

- Data yang disimpan lewat form ini kini benar-benar masuk ke **database PostgreSQL** (`INSERT INTO buku ...`), bukan lagi hanya ke session PHP
- Memakai **prepared statement** untuk keamanan terhadap SQL Injection
- **Validasi manual di PHP (seperti `trim()`, cek field kosong, cek rentang tahun 1900–2026, cek stok tidak negatif) sudah tidak ada lagi** di `proses_tambah.php` Jobsheet 8 — validasi kini hanya mengandalkan atribut `required` di HTML dan aturan tabel database (`NOT NULL`)
- Fitur "isi ulang form otomatis" (`$_SESSION['old']`) sudah dihapus
- Ditambahkan tautan "Batal" di form
- Atribut `min`/`max` pada input Tahun dan `min` pada input Stok sudah tidak ada

