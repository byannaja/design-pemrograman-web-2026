# Penjelasan Kode `assets/js/app.js` (Jobsheet 7)

Pada Jobsheet 7, aplikasi beralih ke pendekatan **server-side dengan PHP** (data disimpan dan diolah di server, bukan lagi diambil dari file JSON lewat `fetch()`). Karena itu, `app.js` disederhanakan drastis — fungsi-fungsi yang berkaitan dengan pengambilan data JSON (`muatDataJSON`), filter tabel, validasi form JavaScript, dan detail buku sudah **dihapus semua**, karena tanggung jawab tersebut kini dipegang oleh PHP di sisi server.

## 1. Hamburger Menu (`initNavToggle`) — Bug Diperbaiki

| Kode | Penjelasan |
|---|---|
| `const toggleBtn = document.getElementById("nav-toggle");` | **Bug dari Jobsheet 6 sudah diperbaiki:** sekarang mencari elemen dengan `id="nav-toggle"`, sesuai dengan id yang benar-benar dipakai di HTML (sebelumnya salah mencari `"nav-toggle-btn"`) |
| `const nav = document.querySelector("header nav");` | Mengambil elemen `<nav>` di dalam `<header>` |
| `if (!toggleBtn \|\| !nav) return;` | Berhenti jika salah satu elemen tidak ditemukan |
| `toggleBtn.addEventListener("click", function () { nav.classList.toggle("nav-open"); });` | Saat tombol hamburger diklik, class `nav-open` ditambah/dihapus dari elemen `<nav>` — kini didukung penuh oleh aturan CSS `header nav.nav-open { display: block; }` yang sudah ditambahkan di `style.css` Jobsheet 7 |

## 2. Konfirmasi Hapus (`initHapusConfirm`) — Disesuaikan untuk Tautan `<a>`

| Kode | Penjelasan |
|---|---|
| `document.addEventListener("click", function (e) { ... });` | Tetap memakai pendekatan **event delegation**, mendengarkan klik di seluruh dokumen |
| `const btn = e.target.closest(".btn-hapus");` | Mencari elemen dengan class `btn-hapus` terdekat dari yang diklik. **Perlu diperhatikan:** kini class `btn-hapus` ada pada elemen `<a>` (tautan ke `hapus.php`) di halaman Daftar Anggota, bukan lagi pada `<button>` |
| `nama = cells[1] ? cells[1].textContent : cells[0].textContent;` | **Diperbarui:** mengambil teks dari sel kolom kedua (indeks 1) sebagai nama data, dengan fallback ke sel pertama jika sel kedua tidak ada |
| `const yakin = confirm(...)` dan `if (yakin) { row.remove(); }` | Menampilkan dialog konfirmasi; jika disetujui, baris dihapus **dari tampilan (DOM)** |

**Catatan penting mengenai perilaku halaman Daftar Anggota vs Daftar Buku:**
- Pada `buku/list.php`, tombol Hapus masih berupa `<button type="button" class="btn-hapus">`, yang **tidak** memiliki `href`, sehingga `confirm()` di JavaScript ini hanya menghapus barisnya secara visual dari tampilan (DOM), **tidak benar-benar menghapus data** dari session PHP — begitu halaman di-refresh, data yang "terhapus" tadi akan muncul kembali
- Pada `anggota/list.php`, tombol Hapus berupa `<a href="hapus.php?...">` yang memiliki atribut `onclick="return confirm(...)"` **bawaan HTML** (bukan dari `app.js`), sehingga jika pengguna menekan "OK", browser akan benar-benar mengikuti tautan ke `hapus.php` (meskipun file `hapus.php` itu sendiri belum termasuk dalam dokumen yang diberikan, sehingga belum bisa dipastikan sudah dibuat atau belum)

## 3. Inisialisasi Utama

| Kode | Penjelasan |
|---|---|
| `document.addEventListener("DOMContentLoaded", function () { initNavToggle(); initHapusConfirm(); });` | Menjalankan kedua fungsi di atas setelah halaman selesai dimuat |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 6)

- **Fungsi `muatDataJSON()` dihapus** — tidak diperlukan lagi karena data kini disiapkan langsung oleh PHP di server, tidak diambil lewat `fetch()`
- **Fungsi `initDetailBuku()` dihapus** — pada halaman Daftar Buku Jobsheet 7, tombol Detail sudah tidak ada lagi
- **Fungsi `initTableFilter()` dihapus** — fitur pencarian/filter tabel sisi client tidak lagi ada di halaman manapun pada Jobsheet 7 ini
- **Fungsi `tampilkanError()`, `hapusError()`, dan `initValidasiForm()` dihapus** — validasi form kini sepenuhnya ditangani oleh PHP di sisi server (`proses_tambah.php`), bukan lagi JavaScript
- Bug pada `initNavToggle()` (salah mencari id) sudah diperbaiki
- `console.log(e.target)` yang dipakai untuk debugging di Jobsheet 6 sudah dihapus

