-- Buat tabel buku
CREATE TABLE IF NOT EXISTS buku (
    id SERIAL PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    pengarang VARCHAR(255) NOT NULL,
    tahun INT NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    kategori VARCHAR(100) NOT NULL
);

-- Buat tabel anggota
CREATE TABLE IF NOT EXISTS anggota (
    no_anggota VARCHAR(50) PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    alamat TEXT NOT NULL,
    no_hp VARCHAR(20) NOT NULL
);