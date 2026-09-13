# Penjelasan Kode `assets/js/buku.js` (Jobsheet 6)

File ini berisi logika **khusus** untuk memuat data buku dan mengatur tombol "Muat Ulang", memanfaatkan fungsi generik `muatDataJSON()` dari `app.js`.

## Fungsi `muatDaftarBuku`

| Kode | Penjelasan |
|---|---|
| `async function muatDaftarBuku() { ... }` | Fungsi `async` untuk memuat data buku dari JSON dan menampilkannya ke tabel |
| `const tbody = document.querySelector(".table-responsive table tbody");` | Mengambil elemen `<tbody>` kosong di tabel Daftar Buku |
| `const loading = document.getElementById("loading-indicator");` | Mengambil elemen indikator loading |
| `if (!tbody) return;` | Berhenti jika `tbody` tidak ditemukan |
| `await muatDataJSON("../data/buku.json", [...], tbody, loading, function (tr, buku) { ... });` | Memanggil fungsi generik `muatDataJSON()`, dengan path file `../data/buku.json`, daftar kolom, dan fungsi untuk mengisi tiap baris |
| `["no", "judul", "pengarang", "tahun", "stok", "kategori"]` | Daftar nama-nama kunci data buku sesuai struktur `buku.json` |
| `function (tr, buku) { tr.innerHTML = "<td>" + buku.no + "</td>" + ... }` | Fungsi callback yang menyusun HTML satu baris data buku: No, Judul, Pengarang, Tahun, Stok, Kategori, lalu kolom Aksi berisi tombol Detail, Edit, dan Hapus |
| `<button type="button" class="btn-detail">Detail</button>` | Tombol Detail, diberi `class="btn-detail"` supaya terdeteksi oleh `initDetailBuku()` di `app.js` (menampilkan info lengkap buku lewat `alert()`) |
| `<button type="button">Edit</button>` | Tombol Edit, belum memiliki fungsi |
| `<button type="button" class="btn-hapus">Hapus</button>` | Tombol Hapus, diberi `class="btn-hapus"` supaya terdeteksi oleh `initHapusConfirm()` di `app.js` |

## Fungsi `initReloadBuku` (Tombol Muat Ulang)

| Kode | Penjelasan |
|---|---|
| `const btnReload = document.getElementById("btn-reload");` | Mengambil tombol "Muat Ulang" dari HTML |
| `if (!btnReload) return;` | Berhenti jika tombol tidak ditemukan |
| `btnReload.addEventListener("click", function () { muatDaftarBuku(); });` | Setiap kali tombol "Muat Ulang" diklik, fungsi `muatDaftarBuku()` dipanggil ulang — artinya tabel akan dikosongkan lalu diisi ulang dari file JSON, lengkap dengan efek loading dan delay 3 detik dari `muatDataJSON()` |

## Event Listener Utama

| Kode | Penjelasan |
|---|---|
| `document.addEventListener("DOMContentLoaded", function () { muatDaftarBuku(); initReloadBuku(); });` | Saat halaman selesai dimuat: data buku langsung dimuat otomatis, dan tombol "Muat Ulang" diaktifkan |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 5)

- File **baru** di Jobsheet 6. Sebelumnya data buku statis di HTML, sekarang dimuat dinamis dari `buku.json`
- Ditambahkan fitur tombol **Muat Ulang** yang tidak ada di Jobsheet 5, memungkinkan pengguna memuat ulang data tanpa me-refresh seluruh halaman
