# Penjelasan Kode `data/anggota.json` & `data/buku.json` (Jobsheet 6)

Kedua file ini adalah sumber data baru di Jobsheet 6. Sebelumnya data anggota dan buku ditulis langsung sebagai baris tabel (`<tr>`) di dalam HTML; sekarang datanya dipisah ke file JSON tersendiri dan diambil secara dinamis lewat JavaScript (`fetch()`).

## `data/anggota.json`

| Bagian | Penjelasan |
|---|---|
| `[ ... ]` | Tanda kurung siku menandakan file ini berisi sebuah **array** (daftar), yaitu kumpulan beberapa data anggota |
| `{ "no_anggota": "A001", "nama": "Siti Aminah", "alamat": "Malang", "no_hp": "0812xxxx" }` | Satu objek data anggota, terdiri dari 4 pasang key-value: nomor anggota, nama, alamat, dan nomor HP |
| Total data | Berisi 10 data anggota (A001–A010), sama persis dengan data yang sebelumnya ditulis statis di HTML pada Jobsheet 3–5 |

## `data/buku.json`

| Bagian | Penjelasan |
|---|---|
| `[ ... ]` | Array berisi kumpulan data buku |
| `{ "no": 1, "judul": "Laskar Pelangi", "pengarang": "Andrea Hirata", "tahun": 2005, "stok": 4, "kategori": "Novel" }` | Satu objek data buku, terdiri dari 6 pasang key-value: nomor, judul, pengarang, tahun terbit, stok, dan kategori |
| Total data | Berisi 10 data buku (nomor 1–10) |
| **Field baru: `kategori`** | Setiap buku kini punya field `kategori` (misalnya "Novel" atau "Pengembangan Diri") — field ini **belum ada** di versi form Tambah Buku Jobsheet 3–5 yang dulu memakai `<select>` dengan opsi Fiksi/Non-Fiksi/Referensi. Nilai kategori di data ini ("Novel", "Pengembangan Diri") juga tidak cocok dengan pilihan dropdown yang lama |
| **Field yang hilang: `isbn`** | Field `isbn` yang ada di form Tambah Buku Jobsheet 3–5 **tidak muncul** di struktur data JSON ini — konsisten dengan form Tambah Buku Jobsheet 6 yang memang sudah tidak memiliki kolom ISBN |
