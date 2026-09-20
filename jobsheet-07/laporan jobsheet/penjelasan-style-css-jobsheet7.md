# Penjelasan Kode `assets/css/style.css` (Jobsheet 7)

Struktur dasar file ini tetap sama seperti Jobsheet 6 (Reset, Header/Navbar, Main Layout, Kartu Statistik, Tabel, Form, Footer, Responsive Breakpoints). Bagian di bawah fokus pada perubahan/pembersihan yang terjadi di Jobsheet 7.

## Perubahan pada Header & Navbar

| Kode | Penjelasan |
|---|---|
| `.nav-toggle { display: block; background: transparent; border: none; font-size: 1.6rem; color: #fff; cursor: pointer; order: 99; }` | **Diperbarui:** class `.nav-toggle` sekarang langsung menata tampilan tombol hamburger (transparan, tanpa border, ukuran ikon, dsb). Sebelumnya (Jobsheet 5–6) class ini hanya berisi `display: none` karena masih dipakai untuk elemen checkbox; sekarang sudah sepenuhnya disesuaikan untuk elemen `<button>` |
| `header nav.nav-open { display: block; }` | **Baru (perbaikan bug):** aturan ini sebelumnya **belum ada** di Jobsheet 6, padahal `app.js` sudah menambahkan/menghapus class `nav-open` lewat `classList.toggle()`. Sekarang aturan CSS-nya sudah ditambahkan, sehingga menu benar-benar akan tampil (`display: block`) saat class `nav-open` aktif |
| `.nav-toggle-label` | **Dihapus sepenuhnya** — sisa-sisa dari pendekatan checkbox hack lama (Jobsheet 3–4) sudah dibersihkan dari file ini karena sudah tidak relevan lagi sejak berpindah ke tombol + JavaScript |
| `.nav-toggle:checked ~ nav` | **Dihapus sepenuhnya** — selector ini juga peninggalan pendekatan checkbox hack yang sudah tidak dipakai |

## Perubahan pada Breakpoint 900px (Tablet Lebar ke Desktop)

| Kode | Penjelasan |
|---|---|
| `.nav-toggle { display: none; }` | Di layar lebar, tombol hamburger disembunyikan (sebelumnya menyembunyikan `.nav-toggle-label`, kini langsung menyembunyikan `.nav-toggle` karena elemennya sudah berupa tombol) |
| `header nav { display: block !important; ... }` | **Diperbarui:** ditambahkan `!important` supaya aturan ini pasti menang dibanding class `.nav-open` yang mungkin masih tertinggal aktif dari interaksi di layar sempit sebelumnya — mencegah menu jadi "nyangkut" tertutup/terbuka saat ukuran layar berubah-ubah (misalnya saat browser di-resize) |

## Bagian yang Dihapus dari Jobsheet 6

- Bagian **"CONTAINER RESPONSIF (TABEL & PRE CODE)"** yang berisi gaya untuk `.code-responsive` dan `pre` sudah tidak ada lagi di versi ini — kemungkinan karena fitur menampilkan blok kode (`<pre>`) memang sudah tidak dipakai di halaman manapun pada Jobsheet 7
- Penomoran bagian komentar dirapikan ulang dari 13 bagian (Jobsheet 6) menjadi 12 bagian (Jobsheet 7), karena bagian kode/pre dihapus

## Bagian yang Tidak Berubah

- Reset & Base, Main Layout, Kartu Statistik, Search Box & Tombol Reload, Loading & Error, Table Counter, Tabel Data, Tombol Aksi, Form, Footer, dan breakpoint 481px tetap sama seperti Jobsheet 6

## Perbedaan dengan Versi Sebelumnya (Jobsheet 6)

- **Bug diperbaiki:** aturan `header nav.nav-open { display: block; }` ditambahkan, melengkapi apa yang sudah dikerjakan `app.js` sejak Jobsheet 6 tapi belum punya pasangan CSS-nya
- Sisa-sisa kode dari pendekatan checkbox hack (`.nav-toggle-label`, `.nav-toggle:checked ~ nav`) sudah dibersihkan
- `!important` ditambahkan pada aturan `header nav` di breakpoint desktop untuk mencegah konflik dengan class `.nav-open`
- Gaya untuk `.code-responsive` dan `pre` dihapus karena tidak lagi dipakai

