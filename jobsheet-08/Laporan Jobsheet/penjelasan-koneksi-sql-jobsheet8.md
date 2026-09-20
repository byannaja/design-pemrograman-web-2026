# Penjelasan Kode `includes/koneksi.php` & `01_buku_anggota.sql` (Jobsheet 8)

Ini adalah perubahan **paling besar** di Jobsheet 8: aplikasi berpindah dari penyimpanan data di **session PHP** (sementara, hilang saat session berakhir) menjadi database sungguhan memakai **PostgreSQL**, sehingga data kini tersimpan secara **permanen**.

## `includes/koneksi.php`

| Kode | Penjelasan |
|---|---|
| `$host = "postgres";` | Alamat server database. Nilai `"postgres"` ini adalah nama *service* (bukan `localhost` atau alamat IP biasa) — menandakan aplikasi kemungkinan dijalankan lewat **Docker**, di mana `postgres` adalah nama container database yang bisa langsung diakses lewat namanya dalam satu jaringan Docker |
| `$port = "5432";` | Nomor port default untuk PostgreSQL |
| `$dbname = "simpus_mini";` | Nama database yang dipakai aplikasi ini |
| `$user = "postgres";` dan `$password = "12345";` | Kredensial (nama pengguna dan kata sandi) untuk masuk ke database |
| `$pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);` | Membuat koneksi ke database memakai **PDO** (PHP Data Objects) — sebuah lapisan/antarmuka standar PHP untuk berkomunikasi dengan berbagai jenis database (di sini memakai driver `pgsql` untuk PostgreSQL) |
| `$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);` | Mengatur PDO supaya setiap kali terjadi error saat berinteraksi dengan database, PHP akan melempar **exception** (yang bisa ditangkap lewat `try-catch`), bukan sekadar gagal secara diam-diam |
| `try { ... } catch (PDOException $e) { echo "Koneksi gagal: " . $e->getMessage(); }` | Jika koneksi ke database gagal (misalnya server database sedang mati, atau kredensial salah), pesan errornya akan ditampilkan langsung ke layar |
| `// echo "Koneksi ke database simpus_mini berhasil!";` | Baris ini dikomentari (dinonaktifkan) — kemungkinan dulunya dipakai untuk menguji apakah koneksi berhasil saat pengembangan, tapi sekarang tidak perlu ditampilkan lagi di produksi |

## `01_buku_anggota.sql`

File ini berisi perintah SQL untuk membuat struktur tabel di database. Nama file yang diawali `01_` menandakan ini adalah skrip migrasi/setup pertama yang perlu dijalankan sebelum aplikasi bisa dipakai.

| Kode | Penjelasan |
|---|---|
| `CREATE TABLE IF NOT EXISTS buku ( ... );` | Membuat tabel `buku` jika belum ada (kalau sudah ada, perintah ini tidak melakukan apa-apa, mencegah error jika skrip dijalankan berulang kali) |
| `id SERIAL PRIMARY KEY` | Kolom `id` dibuat otomatis bertambah (`SERIAL`, mirip `AUTO_INCREMENT` di MySQL) dan dijadikan **kunci utama** (primary key) — nilai unik yang mengidentifikasi setiap baris data secara pasti |
| `judul VARCHAR(255) NOT NULL` | Kolom judul buku, teks maksimal 255 karakter, **wajib diisi** (`NOT NULL`) |
| `pengarang VARCHAR(255) NOT NULL` | Kolom nama pengarang, wajib diisi |
| `tahun INT NOT NULL` | Kolom tahun terbit, berupa angka bulat, wajib diisi |
| `stok INT NOT NULL DEFAULT 0` | Kolom stok, angka bulat, wajib diisi, dengan nilai bawaan `0` jika tidak ditentukan saat data dimasukkan |
| `kategori VARCHAR(100) NOT NULL` | Kolom kategori, teks maksimal 100 karakter, wajib diisi |
| `CREATE TABLE IF NOT EXISTS anggota ( ... );` | Membuat tabel `anggota` |
| `no_anggota VARCHAR(50) PRIMARY KEY` | **Berbeda dari tabel buku:** kunci utama tabel anggota bukan angka otomatis, melainkan `no_anggota` itu sendiri (misalnya "A001") yang dijadikan primary key — artinya nilai ini harus **unik**, tidak boleh ada dua anggota dengan nomor anggota yang sama |
| `nama VARCHAR(255) NOT NULL` | Kolom nama, wajib diisi |
| `alamat TEXT NOT NULL` | Kolom alamat, memakai tipe `TEXT` (tidak dibatasi panjang karakternya seperti `VARCHAR`), wajib diisi |
| `no_hp VARCHAR(20) NOT NULL` | Kolom nomor HP, teks maksimal 20 karakter, wajib diisi |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 7)

- **Perubahan arsitektur paling besar sejauh ini:** data berpindah dari session PHP (sementara) ke **database PostgreSQL** (permanen)
- File `koneksi.php` yang baru menyiapkan koneksi database lewat PDO, dipakai bersama oleh semua halaman yang perlu mengakses data
- File SQL baru (`01_buku_anggota.sql`) mendefinisikan struktur tabel `buku` dan `anggota` di database

