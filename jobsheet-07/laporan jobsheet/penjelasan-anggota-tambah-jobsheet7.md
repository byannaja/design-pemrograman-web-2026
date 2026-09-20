# Penjelasan Kode `anggota/tambah.php` & `anggota/proses_tambah.php` (Jobsheet 7)

Sama seperti pasangan file pada modul Buku, kedua file ini bekerja sama memakai pola **Post-Redirect-Get (PRG)**: `tambah.php` menampilkan form, `proses_tambah.php` memvalidasi dan menyimpan datanya.

## `anggota/tambah.php` — Halaman Form

| Kode | Penjelasan |
|---|---|
| `<?php session_start(); $error = $_SESSION['error'] ?? ''; $old = $_SESSION['old'] ?? []; unset($_SESSION['error'], $_SESSION['old']); ?>` | Mengaktifkan session, mengambil pesan error dan data lama (jika ada) dari percobaan submit sebelumnya, lalu menghapusnya dari session |
| `<?php if (!empty($error)): ?> ... <?php endif; ?>` | Menampilkan kotak notifikasi merah berisi pesan error, jika ada |
| `<form action="proses_tambah.php" method="POST">` | Form mengirim data lewat POST ke `proses_tambah.php` |
| `<label for="no_anggota">No. Anggota</label>` | Label kolom No. Anggota — **posisinya tetap di urutan pertama**, seperti perubahan yang mulai diterapkan sejak Jobsheet 6 |
| `<input type="text" id="no_anggota" name="no_anggota" value="<?= htmlspecialchars($old['no_anggota'] ?? '') ?>" required>` | Kolom input No. Anggota, otomatis terisi ulang dari data sebelumnya (`$old`) jika validasi gagal |
| `<label for="nama">Nama</label>` | Label untuk kolom Nama |
| `<input type="text" id="nama" name="nama" value="..." required>` | Kolom input Nama, dengan pola pengisian ulang yang sama |
| `<label for="alamat">Alamat</label>` | Label untuk kolom Alamat |
| `<input type="text" id="alamat" name="alamat" value="..." required>` | Kolom input Alamat, wajib diisi (atribut `required` tetap ada, sekaligus **kini benar-benar divalidasi** oleh PHP, tidak seperti Jobsheet 6 yang hanya `required` di HTML tanpa validasi JS yang sesuai) |
| `<label for="no_hp">No. HP</label>` | Label untuk kolom No. HP |
| `<input type="text" id="no_hp" name="no_hp" value="..." required>` | Kolom input No. HP, wajib diisi dan divalidasi formatnya di server |
| `<button type="submit">Simpan</button>` | Tombol untuk mengirim form |

## `anggota/proses_tambah.php` — Pemroses Form

| Kode | Penjelasan |
|---|---|
| `if ($_SERVER['REQUEST_METHOD'] === 'POST') { ... } else { ... }` | Memastikan pemrosesan hanya berjalan untuk request POST (hasil submit form); akses langsung lewat URL akan diarahkan kembali ke `tambah.php` |
| `$no_anggota = trim($_POST['no_anggota'] ?? '');` dst | Mengambil dan membersihkan (trim) nilai dari keempat field: No. Anggota, Nama, Alamat, No. HP |
| `$_SESSION['old'] = $_POST;` | Menyimpan seluruh data form ke session untuk keperluan pengisian ulang jika validasi gagal |
| `if ($no_anggota === '' \|\| $nama === '' \|\| $alamat === '' \|\| $no_hp === '') { ... }` | **Validasi 1:** memastikan **semua field** wajib diisi (tidak boleh kosong) — ini melengkapi apa yang sebelumnya baru sebatas atribut `required` di HTML pada Jobsheet 6, kini benar-benar dicek juga di server |
| `$_SESSION['error'] = 'Semua field wajib diisi!';` | Pesan error jika ada field kosong |
| `if (!preg_match('/^[0-9]+$/', $no_hp)) { ... }` | **Validasi 2 (baru):** memakai fungsi `preg_match()` dengan **regular expression** (pola pencocokan teks) `/^[0-9]+$/`, yang berarti "isi harus seluruhnya berupa angka dari awal (`^`) sampai akhir (`$`), minimal satu digit (`+`)". Kalau nomor HP mengandung huruf atau karakter lain, validasi ini akan gagal |
| `$_SESSION['error'] = 'No. HP hanya boleh berisi angka.';` | Pesan error jika format No. HP tidak valid |
| `if (!isset($_SESSION['anggota'])) { $_SESSION['anggota'] = []; }` | Menyiapkan array kosong jika session anggota belum ada |
| `$_SESSION['anggota'][] = [ "no_anggota" => $no_anggota, "nama" => $nama, "alamat" => $alamat, "no_hp" => $no_hp ];` | Menambahkan data anggota baru ke akhir array session |
| `unset($_SESSION['error'], $_SESSION['old']);` | Membersihkan data error dan old karena berhasil |
| `$_SESSION['flash'] = 'Anggota berhasil ditambahkan.';` | Menyiapkan pesan sukses |
| `header('Location: list.php'); exit;` | Mengarahkan ke halaman Daftar Anggota, menampilkan pesan sukses dan data baru |

## Alur Kerja Keseluruhan

1. Pengguna mengisi form di `tambah.php` dan menekan Simpan
2. Data dikirim ke `proses_tambah.php`
3. Divalidasi: semua field wajib diisi, dan No. HP harus berupa angka saja
4. Jika gagal, diarahkan kembali ke `tambah.php` dengan pesan error dan form yang terisi ulang
5. Jika berhasil, data disimpan ke session dan pengguna diarahkan ke `list.php` dengan pesan sukses

## Perbedaan dengan Versi Sebelumnya (Jobsheet 6)

- File `proses_tambah.php` adalah file baru — validasi kini dilakukan di sisi **server** dengan PHP, bukan lagi (atau sekadar) di client dengan JavaScript
- Validasi format No. HP (harus angka saja) kini benar-benar diterapkan lewat `preg_match()` — melengkapi kekurangan di Jobsheet 6 di mana field ini sempat diberi `required` di HTML tapi belum divalidasi JavaScript sama sekali
- Field Alamat juga kini benar-benar divalidasi wajib-isi di server, melengkapi atribut `required` yang sebelumnya "kosong" tanpa validasi pendukung
- Data anggota baru kini benar-benar tersimpan secara persisten (selama session aktif) di server


