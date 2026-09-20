# Penjelasan Kode `buku/tambah.php` & `buku/proses_tambah.php` (Jobsheet 7)

Kedua file ini bekerja sama: `tambah.php` menampilkan **form**, dan `proses_tambah.php` **memproses** data yang dikirim dari form tersebut. Pola ini disebut **PRG (Post-Redirect-Get)**, yang mencegah data terkirim dobel jika pengguna me-refresh halaman setelah submit.

## `buku/tambah.php` — Halaman Form

| Kode | Penjelasan |
|---|---|
| `<?php session_start(); ?>` | Mengaktifkan session PHP |
| `$error = $_SESSION['error'] ?? '';` | Mengambil pesan error (jika ada) dari session — pesan ini dikirim oleh `proses_tambah.php` saat validasi gagal |
| `$old = $_SESSION['old'] ?? [];` | Mengambil data yang **sebelumnya diisi pengguna** (jika ada), supaya form tidak kosong lagi setelah validasi gagal — pengguna tidak perlu mengetik ulang dari awal |
| `unset($_SESSION['error'], $_SESSION['old']);` | Menghapus data error dan old dari session setelah diambil, supaya tidak muncul terus-menerus di kunjungan berikutnya |
| `<?php if (!empty($error)): ?> ... <?php endif; ?>` | Menampilkan kotak notifikasi merah berisi pesan error, jika ada |
| `<form action="proses_tambah.php" method="POST">` | Form akan mengirim data dengan metode POST ke file `proses_tambah.php` saat disubmit |
| `<input type="text" id="judul" name="judul" value="<?= htmlspecialchars($old['judul'] ?? '') ?>" required>` | Kolom input Judul; nilainya diisi otomatis dari `$old['judul']` jika ada (fitur "isi ulang form"), kalau tidak ada maka kosong |
| `<input type="text" id="pengarang" name="pengarang" value="..." required>` | Kolom input Pengarang, dengan pola pengisian ulang nilai yang sama |
| `<input type="number" id="tahun" name="tahun" min="1900" max="2026" value="..." required>` | Kolom input Tahun Terbit, dibatasi 1900–2026 |
| `<input type="number" id="stok" name="stok" min="0" value="..." required>` | Kolom input Stok, minimal 0 |
| `<input type="text" id="kategori" name="kategori" value="..." required>` | **Berubah:** kolom Kategori kini kembali ada di form, tetapi berupa input teks bebas (`<input type="text">`), bukan lagi `<select>` dropdown seperti di Jobsheet 3–5 |
| `<button type="submit">Simpan</button>` | Tombol untuk mengirim form |

## `buku/proses_tambah.php` — Pemroses Form

| Kode | Penjelasan |
|---|---|
| `<?php session_start(); ?>` | Mengaktifkan session PHP |
| `if ($_SERVER['REQUEST_METHOD'] === 'POST') { ... } else { ... }` | Memastikan file ini hanya memproses data jika diakses lewat metode POST (yaitu dari submit form); jika diakses langsung lewat URL (GET), pengguna langsung diarahkan kembali ke `tambah.php` |
| `$judul = trim($_POST['judul'] ?? '');` | Mengambil nilai `judul` dari data yang dikirim form, dan `trim()` menghapus spasi berlebih di awal/akhir. Operator `??` memberi nilai default `''` jika field tidak dikirim |
| `$pengarang`, `$kategori` | Diambil dengan cara serupa |
| `$tahun = (int)($_POST['tahun'] ?? 0);` | Nilai tahun diubah paksa jadi tipe integer (angka bulat) lewat `(int)`, dengan default 0 jika tidak dikirim |
| `$stok = (int)($_POST['stok'] ?? -1);` | Nilai stok juga diubah jadi integer, dengan default -1 (angka negatif) — sengaja dipakai sebagai nilai default supaya validasi "stok tidak boleh negatif" di bawah otomatis akan menangkapnya sebagai tidak valid jika field ini kosong |
| `$_SESSION['old'] = $_POST;` | Menyimpan seluruh data yang dikirim form ke session, untuk keperluan mengisi ulang form jika validasi gagal |
| `if ($judul === '' \|\| $pengarang === '' \|\| $kategori === '') { ... }` | **Validasi 1:** memastikan field Judul, Pengarang, dan Kategori tidak kosong |
| `$_SESSION['error'] = 'Semua field teks wajib diisi!';` | Jika validasi gagal, pesan error disimpan ke session |
| `header('Location: tambah.php'); exit;` | Mengarahkan (redirect) pengguna kembali ke halaman form, membawa pesan error dan data lama yang sudah disimpan di session. `exit` memastikan kode di bawahnya tidak ikut dijalankan |
| `if ($tahun < 1900 \|\| $tahun > 2026) { ... }` | **Validasi 2:** memastikan tahun berada dalam rentang 1900–2026 |
| `if ($stok < 0) { ... }` | **Validasi 3:** memastikan stok tidak negatif |
| `if (!isset($_SESSION['buku'])) { $_SESSION['buku'] = []; }` | Jika session `buku` belum ada (kasus jarang terjadi), disiapkan sebagai array kosong terlebih dulu |
| `$no_baru = count($_SESSION['buku']) + 1;` | Nomor urut buku baru dihitung dari jumlah data yang sudah ada ditambah 1 |
| `$_SESSION['buku'][] = [ "no" => $no_baru, ... ];` | Menambahkan data buku baru ke dalam array session — sintaks `[]` di akhir nama variabel array berarti "tambahkan elemen baru di akhir array" |
| `unset($_SESSION['old'], $_SESSION['error']);` | Membersihkan data lama dan error karena proses berhasil (tidak dibutuhkan lagi) |
| `$_SESSION['flash'] = 'Buku berhasil ditambahkan.';` | Menyiapkan pesan sukses yang akan ditampilkan di halaman berikutnya |
| `header('Location: list.php'); exit;` | Mengarahkan pengguna ke halaman Daftar Buku, di mana pesan flash sukses akan tampil dan data buku baru sudah muncul di tabel |

## Alur Kerja Keseluruhan

1. Pengguna membuka `tambah.php`, mengisi form, lalu menekan Simpan
2. Data dikirim ke `proses_tambah.php` lewat metode POST
3. `proses_tambah.php` memvalidasi data satu per satu; jika ada yang tidak valid, pengguna diarahkan **kembali** ke `tambah.php` dengan pesan error dan form yang sudah terisi ulang otomatis
4. Jika semua valid, data baru disimpan ke session, lalu pengguna diarahkan ke `list.php` dengan pesan sukses

## Perbedaan dengan Versi Sebelumnya (Jobsheet 6)

- **File `proses_tambah.php` adalah file baru** — sebelumnya validasi form sepenuhnya dilakukan lewat JavaScript di sisi client (`initValidasiForm()` pada `app.js`), sekarang dipindahkan menjadi validasi **server-side** dengan PHP
- Form di `tambah.php` sudah tidak lagi memakai atribut `novalidate` maupun bergantung pada JavaScript untuk validasi — validasi kini sepenuhnya jadi tanggung jawab `proses_tambah.php`
- Kolom **ISBN yang sempat dihapus di Jobsheet 6, tetap tidak ada** di versi ini
- Kolom **Kategori kembali muncul**, tapi kini sebagai input teks bebas, bukan dropdown seperti sebelumnya
- Data buku baru kini benar-benar **tersimpan secara persisten** (selama session masih aktif) di server, berbeda dari Jobsheet 6 yang formnya belum benar-benar terhubung ke penyimpanan data manapun

