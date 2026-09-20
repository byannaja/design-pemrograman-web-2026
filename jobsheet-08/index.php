<?php
require_once 'includes/koneksi.php';

// Menghitung total data dari database untuk kartu statistik
try {
    $stmtBuku = $pdo->query("SELECT COUNT(*) FROM buku");
    $totalBuku = $stmtBuku->fetchColumn();

    $stmtAnggota = $pdo->query("SELECT COUNT(*) FROM anggota");
    $totalAnggota = $stmtAnggota->fetchColumn();
} catch (PDOException $e) {
    $totalBuku = 0;
    $totalAnggota = 0;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPUS-Mini - Beranda</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>SIMPUS-Mini</h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="buku/list.php">Daftar Buku</a></li>
                <li><a href="buku/tambah.php">Tambah Buku</a></li>
                <li><a href="anggota/list.php">Daftar Anggota</a></li>
                <li><a href="anggota/tambah.php">Tambah Anggota</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Selamat Datang di Sistem Perpustakaan Mini</h2>
            <p>Data saat ini telah terhubung secara permanen menggunakan database PostgreSQL.</p>
        </section>

        <section>
            <h2>Ringkasan Statistik</h2>
            <div class="stats-container" style="display: flex; gap: 20px; margin-top: 15px;">
                <article style="border: 1px solid #ccc; padding: 15px; border-radius: 5px; min-width: 150px;">
                    <h3>Total Buku</h3>
                    <p style="font-size: 1.5rem; font-weight: bold;"><?= $totalBuku ?></p>
                </article>
                <article style="border: 1px solid #ccc; padding: 15px; border-radius: 5px; min-width: 150px;">
                    <h3>Total Anggota</h3>
                    <p style="font-size: 1.5rem; font-weight: bold;"><?= $totalAnggota ?></p>
                </article>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 8</p>
    </footer>
    <script src="assets/js/app.js"></script>
</body>
</html>