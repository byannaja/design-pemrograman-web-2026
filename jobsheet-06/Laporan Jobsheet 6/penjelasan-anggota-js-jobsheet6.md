# Penjelasan Kode `assets/js/anggota.js` (Jobsheet 6)

File ini berisi logika **khusus** untuk memuat dan menampilkan data anggota, memanfaatkan fungsi generik `muatDataJSON()` yang didefinisikan di `app.js`. File ini hanya perlu dimuat di halaman Daftar Anggota.

## Fungsi `muatDaftarAnggota`

| Kode | Penjelasan |
|---|---|
| `async function muatDaftarAnggota() { ... }` | Fungsi `async` untuk memuat data anggota dari JSON dan menampilkannya ke tabel |
| `const tbody = document.querySelector(".table-responsive table tbody");` | Mengambil elemen `<tbody>` kosong di dalam tabel, tempat baris-baris data anggota akan dimasukkan |
| `const loading = document.getElementById("loading-indicator");` | Mengambil elemen indikator loading (teks "Memuat data...") |
| `if (!tbody) return;` | Berhenti jika `tbody` tidak ditemukan (misalnya file ini secara tidak sengaja dimuat di halaman yang tidak punya tabel) |
| `await muatDataJSON("../data/anggota.json", [...], tbody, loading, function (tr, anggota) { ... });` | Memanggil fungsi generik `muatDataJSON()` dari `app.js`, dengan memberikan: path file JSON (`../data/anggota.json`), daftar nama kolom, elemen tbody, elemen loading, dan sebuah fungsi khusus untuk mengisi tiap baris |
| `["no_anggota", "nama", "alamat", "no_hp"]` | Daftar nama-nama kunci/kolom data anggota, dipakai `muatDataJSON()` untuk menentukan jumlah `colspan` pada baris error jika terjadi kegagalan |
| `function (tr, anggota) { tr.innerHTML = "<td>" + anggota.no_anggota + "</td>" + ... }` | Fungsi callback yang mengisi satu baris (`tr`) berdasarkan satu objek data `anggota`, dengan menyusun HTML kolom-kolomnya: No. Anggota, Nama, Alamat, No. HP, lalu kolom Aksi berisi tombol Edit dan Hapus |
| `<button type="button">Edit</button>` | Tombol Edit yang dibuat secara dinamis, belum memiliki fungsi |
| `<button type="button" class="btn-hapus">Hapus</button>` | Tombol Hapus yang dibuat secara dinamis, diberi `class="btn-hapus"` supaya terdeteksi oleh event delegation di `initHapusConfirm()` pada `app.js` |

## Event Listener Utama

| Kode | Penjelasan |
|---|---|
| `document.addEventListener("DOMContentLoaded", function () { muatDaftarAnggota(); });` | Memuat data anggota secara otomatis begitu halaman selesai dimuat |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 5)

- Ini adalah file **baru** di Jobsheet 6. Sebelumnya (Jobsheet 5), data anggota masih ditulis langsung sebagai baris `<tr>` statis di dalam HTML; sekarang datanya dipindah ke file `anggota.json` dan ditampilkan secara **dinamis** memakai JavaScript
