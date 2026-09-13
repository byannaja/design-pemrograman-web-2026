# Penjelasan Kode `assets/js/app.js` (Jobsheet 6)

Pada Jobsheet 6, `app.js` berubah peran menjadi file JavaScript **umum/generik** yang dipakai di semua halaman, sementara logika khusus untuk memuat data anggota dan buku dipisah ke file `anggota.js` dan `buku.js` masing-masing. Ini adalah praktik pemrograman yang disebut **modularisasi** — memecah kode jadi bagian-bagian kecil sesuai tanggung jawabnya.

## 1. Fungsi Generik Memuat Data JSON (`muatDataJSON`)

Ini adalah fungsi **baru dan paling penting** di Jobsheet 6, dipakai bersama oleh `anggota.js` maupun `buku.js`.

| Kode | Penjelasan |
|---|---|
| `async function muatDataJSON(namaFile, namaKunci, tbody, loading, renderBaris) { ... }` | Fungsi `async` (asinkron) generik untuk mengambil data dari file JSON dan menampilkannya ke dalam tabel. Menerima 5 parameter: nama file JSON, daftar nama kolom, elemen `tbody`, elemen indikator loading, dan fungsi untuk merender satu baris |
| `if (!tbody) return;` | Berhenti jika elemen `tbody` tidak ditemukan |
| `if (loading) { loading.style.display = "block"; }` | Jika ada elemen indikator loading, tampilkan terlebih dahulu (misalnya teks "Memuat data...") |
| `tbody.innerHTML = "";` | Mengosongkan isi tabel sebelum data baru dimuat, mencegah data lama menumpuk dengan data baru |
| `try { ... } catch (err) { ... } finally { ... }` | Struktur penanganan error: kode di `try` dicoba dijalankan, kalau gagal masuk ke `catch`, dan `finally` selalu dijalankan di akhir apa pun hasilnya |
| `await new Promise(function (resolve) { setTimeout(resolve, 3000); });` | **Simulasi delay** 3000 ms (3 detik) sebelum data benar-benar diambil — ini sengaja ditambahkan untuk latihan, supaya efek "Memuat data..." terlihat jelas (di dunia nyata delay seperti ini biasanya terjadi otomatis karena koneksi jaringan, bukan ditambahkan manual) |
| `const res = await fetch(namaFile);` | Mengambil file JSON dari path yang diberikan, menggunakan `fetch()` — cara standar JavaScript untuk mengambil data dari server atau file |
| `if (!res.ok) { throw new Error("Gagal mengambil data (status " + res.status + ")"); }` | Jika permintaan gagal (misalnya file tidak ditemukan/404), lempar error dengan pesan yang menyertakan kode status HTTP |
| `const data = await res.json();` | Mengubah hasil response menjadi format JavaScript (array/object) dari teks JSON |
| `data.forEach(function (item) { ... });` | Melakukan perulangan untuk setiap item data (misalnya setiap anggota atau setiap buku) |
| `const tr = document.createElement("tr");` | Membuat elemen baris tabel baru secara dinamis |
| `renderBaris(tr, item, namaKunci);` | Memanggil fungsi `renderBaris` yang **disediakan oleh pemanggil** (`anggota.js` atau `buku.js`) untuk mengisi konten baris sesuai kebutuhan masing-masing halaman |
| `tbody.appendChild(tr);` | Menambahkan baris yang sudah diisi ke dalam tabel |
| `catch (err) { tbody.innerHTML = "<tr><td colspan=\"...\" class=\"error-row\">Gagal memuat data: " + err.message + "</td></tr>"; }` | Jika terjadi error di mana pun dalam proses `try`, tabel akan menampilkan satu baris pesan error yang merentang penuh (`colspan`) dengan class `error-row` |
| `finally { if (loading) { loading.style.display = "none"; } }` | Apa pun hasilnya (berhasil atau gagal), indikator loading akhirnya disembunyikan kembali |

## 2. Hamburger Menu (`initNavToggle`) — Diperbarui

| Kode | Penjelasan |
|---|---|
| `const toggleBtn = document.getElementById("nav-toggle-btn");` | **Perlu diperiksa:** fungsi ini mencari elemen dengan `id="nav-toggle-btn"`, padahal tombol hamburger di HTML sekarang memakai `id="nav-toggle"` (tanpa `-btn`). Ini kemungkinan **bug**, karena elemen dengan id tersebut tidak akan ditemukan, sehingga fitur hamburger menu berpotensi tidak berfungsi |
| `nav.classList.toggle("nav-open");` | **Berubah:** pendekatan toggle kini memakai `classList.toggle()` untuk menambah/menghapus class `nav-open`, bukan lagi memanipulasi `style.display` secara langsung seperti Jobsheet 5. Namun perlu dicek apakah class `nav-open` ini sudah didefinisikan gayanya (`display: block`, dst) di `style.css` — dari file CSS yang diberikan, class ini **belum terlihat** ada |

## 3. Konfirmasi Hapus (`initHapusConfirm`) — Diperbarui

| Kode | Penjelasan |
|---|---|
| `document.addEventListener("click", function (e) { ... });` | **Berubah pendekatan:** alih-alih memasang event listener ke setiap tombol Hapus satu per satu (seperti Jobsheet 5), sekarang memakai teknik **event delegation** — satu listener dipasang di `document`, lalu diperiksa apakah elemen yang diklik cocok |
| `console.log(e.target);` | Baris untuk keperluan latihan/debugging, menampilkan elemen yang diklik ke console browser |
| `const btn = e.target.closest(".btn-hapus");` | Mencari tombol dengan class `btn-hapus` terdekat dari elemen yang diklik (mendukung klik di teks tombol maupun ikon di dalamnya) |
| `if (!btn) return;` | Jika yang diklik bukan tombol Hapus, fungsi berhenti (tidak melakukan apa-apa) |
| `const cells = row.querySelectorAll("td");` | Mengambil semua sel di baris tersebut |
| `let nama = "data ini"; if (cells.length > 0) { nama = cells[0].textContent; }` | Mengambil teks dari **sel pertama** (indeks 0) sebagai nama data yang akan dikonfirmasi — pada tabel anggota ini berarti "No. Anggota", bukan "Nama" (berbeda dari Jobsheet 5 yang mengambil sel kedua) |
| `const yakin = confirm(...)` dan `if (yakin) { row.remove(); }` | Sama seperti sebelumnya: tampilkan dialog konfirmasi, hapus baris jika disetujui |

**Kenapa pendekatan event delegation dipakai?** Karena sekarang baris tabel dibuat **secara dinamis** lewat JavaScript setelah data JSON dimuat, memasang event listener satu-satu ke tombol yang belum tentu ada saat halaman pertama kali dimuat tidak akan berhasil. Event delegation memungkinkan tombol yang baru dibuat pun tetap bisa merespons klik, karena listener-nya dipasang di elemen induk (`document`) yang sudah ada sejak awal.

## 4. Detail Buku (`initDetailBuku`) — Baru

| Kode | Penjelasan |
|---|---|
| `const btn = e.target.closest(".btn-detail");` | Sama seperti konfirmasi hapus, memakai event delegation untuk mendeteksi klik pada tombol dengan class `btn-detail` |
| `const no = cells[0] ? cells[0].textContent : "-";` dst | Mengambil isi tiap sel di baris (No, Judul, Pengarang, Tahun, Stok, Kategori), dengan nilai default `"-"` jika sel tidak ditemukan |
| `alert("DETAIL BUKU\n\n" + "No: " + no + ...)` | Menampilkan seluruh informasi buku dalam satu kotak dialog `alert()` sederhana |

## 5. Filter/Pencarian Tabel (`initTableFilter`) — Diperbarui

| Kode | Penjelasan |
|---|---|
| `const teks = row.textContent.toLowerCase();` | **Berubah:** pencarian sekarang mencocokkan kata kunci terhadap **seluruh teks di baris** (`row.textContent`), bukan hanya kolom nama tertentu seperti di Jobsheet 5. Artinya pengguna sekarang bisa mencari berdasarkan kolom mana pun (misalnya mencari pengarang, alamat, atau kategori), tidak terbatas pada satu kolom saja |
| `row.style.display = ...` | Sama seperti sebelumnya, baris ditampilkan/disembunyikan berdasarkan hasil pencocokan |

**Catatan:** Fungsi ini di Jobsheet 6 sudah **tidak lagi memanggil `updateTableCounter()`**, dan fungsi `updateTableCounter` sendiri **sudah dihapus** dari `app.js` — padahal elemen `#table-counter` masih ada di HTML. Ini berarti elemen tersebut akan tetap kosong karena tidak ada lagi kode yang mengisinya.

## 6–7. Helper Validasi (`tampilkanError`, `hapusError`)

Sama seperti Jobsheet 5: `tampilkanError` menambahkan elemen `<span class="error">` berisi pesan di bawah input yang bermasalah, `hapusError` menghapusnya kembali jika ada.

## 8. Validasi Form (`initValidasiForm`) — Disederhanakan & Digeneralisasi

| Kode | Penjelasan |
|---|---|
| `const judul = form.querySelector("[name='judul'], [name='nama']");` | **Menarik:** selector ini mencari field bernama `judul` **atau** `nama`, membuat satu blok validasi ini bisa dipakai untuk form Tambah Buku (field `judul`) maupun form Tambah Anggota (field `nama`) sekaligus |
| Validasi Pengarang, Tahun, Stok | Sama seperti Jobsheet 5, tapi ditulis ulang dengan gaya format yang lebih panjang/vertikal (kemungkinan hasil dari code formatter atau gaya penulisan yang lebih eksplisit) |
| **Dibandingkan Jobsheet 5** | Aturan validasi untuk **ISBN** dan **No. HP** sudah **tidak ada lagi** di versi ini — kemungkinan disederhanakan karena field ISBN memang sudah dihapus dari form Tambah Buku Jobsheet 6, tapi field No. HP masih ada di form Tambah Anggota tanpa validasi format khusus |

## 9. Inisialisasi Semua Fitur

| Kode | Penjelasan |
|---|---|
| `document.addEventListener("DOMContentLoaded", function () { initNavToggle(); initHapusConfirm(); initDetailBuku(); initTableFilter(); initValidasiForm(); });` | Menjalankan seluruh fungsi inisialisasi setelah halaman selesai dimuat. **Catatan:** `updateTableCounter()` yang ada di Jobsheet 5 sudah tidak dipanggil lagi di sini karena fungsinya sudah dihapus |

## Perbedaan dengan Versi Sebelumnya (Jobsheet 5)

- Ditambahkan fungsi generik `muatDataJSON()` untuk mengambil data dari file JSON secara asinkron (`fetch` + `async/await`), lengkap dengan indikator loading dan penanganan error
- Konfirmasi hapus dan detail buku beralih ke pendekatan **event delegation**, supaya tetap berfungsi untuk baris tabel yang dibuat secara dinamis
- Pencarian tabel kini mencocokkan seluruh isi baris, bukan hanya satu kolom
- Fungsi `updateTableCounter()` dan pemanggilan `initTableFilter` terhadapnya sudah **dihapus**, meskipun elemen `#table-counter` masih ada di HTML
- Validasi form disederhanakan dan digeneralisasi untuk field `judul`/`nama` sekaligus, sementara validasi ISBN dan No. HP dihapus
