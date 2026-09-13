# Penjelasan Kode `assets/js/app.js` (Jobsheet 5)

File ini adalah file JavaScript pertama pada aplikasi SIMPUS-Mini, berisi beberapa fungsi untuk menambahkan interaktivitas: menu hamburger, konfirmasi hapus, pencarian/filter tabel, penghitung baris, dan validasi form.

## 1. Hamburger Menu (`initNavToggle`)

| Kode | Penjelasan |
|---|---|
| `function initNavToggle() { ... }` | Fungsi untuk mengatur perilaku tombol hamburger (buka-tutup menu navigasi) |
| `const toggleBtn = document.getElementById("nav-toggle");` | Mengambil elemen tombol hamburger dari HTML lewat `id="nav-toggle"` |
| `const nav = document.querySelector("header nav");` | Mengambil elemen `<nav>` yang ada di dalam `<header>` |
| `if (!toggleBtn \|\| !nav) return;` | Jika salah satu elemen tidak ditemukan di halaman, fungsi langsung berhenti (mencegah error) |
| `toggleBtn.addEventListener("click", function () { ... });` | Menambahkan "pendengar" event klik pada tombol hamburger |
| `if (nav.style.display === "block") { nav.style.display = ""; } else { nav.style.display = "block"; }` | Logika toggle: jika menu sedang tampil (`block`), maka disembunyikan kembali; jika belum tampil, maka ditampilkan |

**Catatan penting:** Di Jobsheet 5 ini, mekanisme hamburger menu **berubah total** dari versi sebelumnya. Yang tadinya pakai *checkbox hack* murni CSS (`<input type="checkbox">` + `:checked ~ nav`), sekarang diganti dengan `<button>` yang dikendalikan lewat JavaScript. Pendekatan JavaScript ini lebih fleksibel, misalnya untuk menambahkan animasi atau logika tambahan di kemudian hari.

## 2. Konfirmasi Hapus & Update Counter (`initHapusConfirm`)

| Kode | Penjelasan |
|---|---|
| `const btns = document.querySelectorAll(".btn-hapus");` | Mengambil semua tombol yang memiliki class `btn-hapus` (tombol Hapus di setiap baris tabel) |
| `if (btns.length === 0) return;` | Jika tidak ada tombol hapus ditemukan, fungsi berhenti |
| `btns.forEach(function (btn) { ... });` | Melakukan perulangan untuk setiap tombol hapus, menambahkan event klik pada masing-masing |
| `const row = btn.closest("tr");` | Mencari baris (`<tr>`) terdekat yang menjadi induk dari tombol yang diklik |
| `const namaCell = row ? row.querySelectorAll("td")[1] : null;` | Mengambil sel kolom kedua (indeks ke-1) pada baris tersebut, yaitu kolom Nama |
| `const nama = namaCell ? namaCell.textContent : "data ini";` | Mengambil teks nama dari sel tersebut; jika tidak ditemukan, pakai teks default "data ini" |
| `const yakin = confirm('Yakin ingin menghapus "' + nama + '"?');` | Menampilkan kotak dialog konfirmasi bawaan browser, menanyakan apakah pengguna yakin ingin menghapus data tersebut |
| `if (yakin && row) { row.remove(); updateTableCounter(); }` | Jika pengguna menekan "OK", baris tabel dihapus dari halaman, lalu penghitung jumlah data diperbarui |

## 3. Filter Tabel Berdasarkan Nama (`initTableFilter`)

| Kode | Penjelasan |
|---|---|
| `const input = document.getElementById("search-input") \|\| document.querySelector(".search-box input");` | Mengambil kolom input pencarian; mencoba dulu lewat `id="search-input"`, kalau tidak ada baru dicari lewat class `.search-box input` (mendukung dua struktur HTML yang berbeda) |
| `const table = document.querySelector(".table-responsive table");` | Mengambil elemen tabel di dalam pembungkus `table-responsive` |
| `if (!input \|\| !table) return;` | Berhenti jika salah satu elemen tidak ditemukan |
| `input.addEventListener("keyup", function () { ... });` | Setiap kali pengguna melepas tombol keyboard (mengetik) di kolom pencarian, fungsi di dalamnya dijalankan |
| `const keyword = input.value.toLowerCase();` | Mengambil kata kunci yang diketik, diubah semua jadi huruf kecil supaya pencarian tidak peduli besar-kecil huruf |
| `const rows = table.querySelectorAll("tbody tr");` | Mengambil semua baris data di dalam tabel |
| `rows.forEach(function (row) { ... });` | Melakukan perulangan untuk memeriksa tiap baris satu per satu |
| `const namaCell = row.querySelectorAll("td")[1];` | Mengambil sel kolom Nama pada baris tersebut |
| `const teksNama = namaCell ? namaCell.textContent.toLowerCase() : "";` | Mengambil teks nama, diubah jadi huruf kecil juga |
| `row.style.display = teksNama.includes(keyword) ? "" : "none";` | Jika nama mengandung kata kunci yang dicari, baris ditampilkan; jika tidak, baris disembunyikan (`display: none`) |
| `updateTableCounter();` | Setelah filter dijalankan, penghitung jumlah data yang tampil diperbarui |

## 4. Penghitung Jumlah Baris (`updateTableCounter`)

| Kode | Penjelasan |
|---|---|
| `const table = document.querySelector(".table-responsive table");` | Mengambil tabel |
| `const counterEl = document.getElementById("table-counter");` | Mengambil elemen teks (misalnya `<p id="table-counter">`) tempat menampilkan hasil hitungan |
| `if (!table \|\| !counterEl) return;` | Berhenti jika salah satu elemen tidak ada |
| `const allRows = table.querySelectorAll("tbody tr");` | Mengambil seluruh baris data (baik yang tampil maupun yang disembunyikan) |
| `let visibleCount = 0;` | Variabel penghitung, dimulai dari 0 |
| `allRows.forEach(function (row) { if (row.style.display !== "none") { visibleCount++; } });` | Untuk tiap baris, jika baris itu tidak disembunyikan, hitungannya ditambah 1 |
| `counterEl.textContent = \`Menampilkan ${visibleCount} dari ${allRows.length} data\`;` | Menampilkan teks hasil hitungan, misalnya "Menampilkan 3 dari 10 data" |

## 5. Fungsi Bantuan Validasi (`tampilkanError` & `hapusError`)

| Kode | Penjelasan |
|---|---|
| `function tampilkanError(input, pesan) { ... }` | Fungsi untuk menampilkan pesan error di bawah sebuah input |
| `hapusError(input);` | Menghapus pesan error lama (kalau ada) sebelum menampilkan yang baru, supaya tidak dobel |
| `const span = document.createElement("span");` | Membuat elemen `<span>` baru secara dinamis lewat JavaScript |
| `span.className = "error";` | Memberi class `error` pada elemen tersebut, supaya bisa diberi gaya lewat CSS |
| `span.textContent = pesan;` | Mengisi teks pesan error ke dalam elemen tersebut |
| `input.insertAdjacentElement("afterend", span);` | Menyisipkan elemen `<span>` pesan error tepat setelah elemen input yang bersangkutan |
| `function hapusError(input) { ... }` | Fungsi untuk menghapus pesan error yang sudah ditampilkan sebelumnya |
| `const next = input.nextElementSibling;` | Mengambil elemen tepat setelah input tersebut |
| `if (next && next.classList.contains("error")) { next.remove(); }` | Jika elemen tersebut ada dan memiliki class `error`, maka dihapus dari halaman |

## 6. Validasi Form (`initValidasiForm`)

| Kode | Penjelasan |
|---|---|
| `const form = document.getElementById("form-tambah");` | Mengambil elemen form lewat `id="form-tambah"` |
| `if (!form) return;` | Berhenti jika form tidak ditemukan di halaman ini |
| `form.addEventListener("submit", function (e) { ... });` | Menjalankan fungsi validasi setiap kali form akan dikirim (submit) |
| `let valid = true;` | Variabel penanda apakah semua isian form sudah valid, awalnya dianggap valid |
| `const validationRules = [ ... ];` | Array berisi daftar aturan validasi untuk berbagai kolom (nama, no_anggota, judul, pengarang, isbn, no_hp, tahun, stok), masing-masing punya nama field, fungsi `validate`, dan `message` (pesan error) |
| `validationRules.forEach(function (rule) { ... });` | Melakukan pengecekan satu per satu untuk tiap aturan dalam daftar |
| `const field = form.querySelector(\`[name='${rule.name}']\`);` | Mencari elemen input di dalam form berdasarkan atribut `name` |
| `if (field) { if (!rule.validate(field.value)) { tampilkanError(field, rule.message); valid = false; } else { hapusError(field); } }` | Jika field ditemukan: jalankan fungsi validasinya; kalau tidak valid, tampilkan pesan error dan tandai form sebagai tidak valid; kalau valid, hapus pesan error (jika ada) |
| `if (!valid) { e.preventDefault(); }` | Jika ada satu saja isian yang tidak valid, pengiriman form dibatalkan (`preventDefault`) sehingga halaman tidak pindah/reload dan pengguna bisa memperbaiki isiannya |

**Aturan validasi yang diterapkan:**
- **Nama, No. Anggota, Judul, Pengarang** — wajib diisi (tidak boleh kosong)
- **ISBN** — boleh kosong, tapi kalau diisi hanya boleh berisi angka dan tanda hubung (`-`)
- **No. HP** — boleh kosong, tapi kalau diisi hanya boleh berisi angka dan tanda plus (`+`)
- **Tahun** — boleh kosong, tapi kalau diisi harus berupa angka antara 1900–2026
- **Stok** — boleh kosong, tapi kalau diisi tidak boleh bernilai negatif

## 7. Event Listener Utama

| Kode | Penjelasan |
|---|---|
| `document.addEventListener("DOMContentLoaded", function () { ... });` | Memastikan seluruh kode di dalamnya baru dijalankan **setelah** struktur HTML halaman selesai dimuat sepenuhnya, supaya elemen yang dicari (`getElementById`, dsb) sudah pasti ada |
| `initNavToggle();` | Mengaktifkan fitur hamburger menu |
| `initHapusConfirm();` | Mengaktifkan fitur konfirmasi hapus |
| `initTableFilter();` | Mengaktifkan fitur pencarian/filter tabel |
| `initValidasiForm();` | Mengaktifkan fitur validasi form |
| `updateTableCounter();` | Menjalankan penghitung baris sekali di awal, supaya langsung menampilkan jumlah data saat halaman pertama kali dibuka |
