# Biodata Mahasiswa

|  | Biodata | 
| --- | --- |
| Nama | Muhammad Abyan Andhi Putra|
| NIM | 254107020149 |
| Kelas | TI-2D |

## Deployment ke Vercel

Gunakan root repository ini sebagai Root Directory Vercel. Proyek memakai runtime PHP untuk endpoint di folder `api/` dan PostgreSQL Supabase untuk Jobsheet 8 sampai 11.

Tambahkan environment variables berikut di pengaturan proyek Vercel untuk setiap environment yang digunakan:

- `SUPABASE_DB_HOST`
- `SUPABASE_DB_PORT` (umumnya `5432`)
- `SUPABASE_DB_NAME` (umumnya `postgres`)
- `SUPABASE_DB_USER`
- `SUPABASE_DB_PASSWORD`

Jangan simpan kredensial database di file sumber. Kredensial yang sebelumnya pernah tersimpan di repository perlu dirotasi di Supabase sebelum deployment.