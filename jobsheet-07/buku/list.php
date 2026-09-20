<?php
session_start();
$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);

// Inisialisasi 10 data buku lengkap sesuai dataset Anda di session jika belum ada
if (!isset($_SESSION['buku'])) {
    $_SESSION['buku'] = [
        ["no" => 1, "judul" => "Laskar Pelangi", "pengarang" => "Andrea Hirata", "tahun" => 2005, "stok" => 4, "kategori" => "Novel"],
        ["no" => 2, "judul" => "Bumi Manusia", "pengarang" => "Pramoedya Ananta Toer", "tahun" => 1980, "stok" => 2, "kategori" => "Novel"],
        ["no" => 3, "judul" => "Negeri 5 Menara", "pengarang" => "Ahmad Fuadi", "tahun" => 2009, "stok" => 0, "kategori" => "Novel"],
        ["no" => 4, "judul" => "Filosofi Teras", "pengarang" => "Henry Manampiring", "tahun" => 2018, "stok" => 5, "kategori" => "Pengembangan Diri"],
        ["no" => 5, "judul" => "Ronggeng Dukuh Paruk", "pengarang" => "Ahmad Tohari", "tahun" => 1982, "stok" => 1, "kategori" => "Novel"],
        ["no" => 6, "judul" => "Bumi Manusia", "pengarang" => "Pramoedya Ananta Toer", "tahun" => 1980, "stok" => 2, "kategori" => "Novel"],
        ["no" => 7, "judul" => "Lenyap", "pengarang" => "Richard Kemen", "tahun" => 2024, "stok" => 3, "kategori" => "Novel"],
        ["no" => 8, "judul" => "Ayat-Ayat Cinta", "pengarang" => "Habiburrahman El Shirazy", "tahun" => 2004, "stok" => 6, "kategori" => "Novel"],
        ["no" => 9, "judul" => "Bogor Mengaduk Waktu", "pengarang" => "Bhuanasastra", "tahun" => 2022, "stok" => 2, "kategori" => "Novel"],
        ["no" => 10, "judul" => "Perahu Kertas", "pengarang" => "Dee Lestari", "tahun" => 2009, "stok" => 0, "kategori" => "Novel"]
    ];
}
$daftar_buku = $_SESSION['buku'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - SIMPUS-Mini</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>SIMPUS-Mini</h1>
        <button id="nav-toggle" class="nav-toggle" type="button">&#9776;</button>
        <nav>
            <ul>
                <li><a href="../index.php">Beranda</a></li>
                <li><a href="list.php">Daftar Buku</a></li>
                <li><a href="tambah.php">Tambah Buku</a></li>
                <li><a href="../anggota/list.php">Daftar Anggota</a></li>
                <li><a href="../anggota/tambah.php">Tambah Anggota</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Daftar Buku</h2>
            
            <?php if (!empty($flash)): ?>
                <div class="flash-message" style="background-color: #dff0d8; color: #3c763d; padding: 0.75rem; margin-bottom: 1rem; border-radius: 4px;">
                    <?= htmlspecialchars($flash) ?>
                </div>
            <?php endif; ?>

            <div style="margin-bottom: 1rem;">
                <a href="tambah.php" style="padding: 8px 12px; background: #007bff; color: white; text-decoration: none; border-radius: 4px;">+ Tambah Buku Baru</a>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($daftar_buku as $buku): ?>
                        <tr>
                            <td><?= htmlspecialchars($buku['no']) ?></td>
                            <td><?= htmlspecialchars($buku['judul']) ?></td>
                            <td><?= htmlspecialchars($buku['pengarang']) ?></td>
                            <td><?= htmlspecialchars($buku['tahun']) ?></td>
                            <td><?= htmlspecialchars($buku['stok']) ?></td>
                            <td><?= htmlspecialchars($buku['kategori']) ?></td>
                            <td>
                                <button type="button">Edit</button>
                                <button type="button" class="btn-hapus">Hapus</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 7</p>
    </footer>

    <script src="../assets/js/app.js"></script>
</body>
</html>