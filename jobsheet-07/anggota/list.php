<?php
session_start();
$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);

if (!isset($_SESSION['anggota'])) {
    $_SESSION['anggota'] = [
        ["no_anggota" => "A001", "nama" => "Siti Aminah", "alamat" => "Malang", "no_hp" => "0812xxxx"],
        ["no_anggota" => "A002", "nama" => "Budi Santoso", "alamat" => "Batu", "no_hp" => "0813xxxx"],
        ["no_anggota" => "A003", "nama" => "Safik Wijaya", "alamat" => "Malang", "no_hp" => "0814xxxx"],
        ["no_anggota" => "A004", "nama" => "Bagus Prakoso", "alamat" => "Malang", "no_hp" => "0815xxxx"],
        ["no_anggota" => "A005", "nama" => "Likasari", "alamat" => "Batu", "no_hp" => "0816xxxx"],
        ["no_anggota" => "A006", "nama" => "Rudi Hartono", "alamat" => "Malang", "no_hp" => "0817xxxx"],
        ["no_anggota" => "A007", "nama" => "Maulana", "alamat" => "Pakis", "no_hp" => "0818xxxx"],
        ["no_anggota" => "A008", "nama" => "Bambang Daeu", "alamat" => "Malang", "no_hp" => "0819xxxx"],
        ["no_anggota" => "A009", "nama" => "Sule Prikitiw", "alamat" => "Lawang", "no_hp" => "0820xxxx"],
        ["no_anggota" => "A010", "nama" => "Rina Sari", "alamat" => "Malang", "no_hp" => "0821xxxx"]
    ];
}
$daftar_anggota = $_SESSION['anggota'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota - SIMPUS-Mini</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>SIMPUS-Mini</h1>
        <button id="nav-toggle" class="nav-toggle" type="button">&#9776;</button>
        <nav>
            <ul>
                <li><a href="../index.php">Beranda</a></li>
                <li><a href="../buku/list.php">Daftar Buku</a></li>
                <li><a href="../buku/tambah.php">Tambah Buku</a></li>
                <li><a href="list.php">Daftar Anggota</a></li>
                <li><a href="tambah.php">Tambah Anggota</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Daftar Anggota</h2>
            
            <?php if (!empty($flash)): ?>
                <div class="flash-message" style="background-color: #dff0d8; color: #3c763d; padding: 0.75rem; margin-bottom: 1rem; border-radius: 4px;">
                    <?= htmlspecialchars($flash) ?>
                </div>
            <?php endif; ?>

            <div style="margin-bottom: 1rem;">
                <a href="tambah.php" style="padding: 8px 12px; background: #007bff; color: white; text-decoration: none; border-radius: 4px;">+ Tambah Anggota Baru</a>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No Anggota</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($daftar_anggota as $anggota): ?>
                        <tr>
                            <td><?= htmlspecialchars($anggota['no_anggota']) ?></td>
                            <td><?= htmlspecialchars($anggota['nama']) ?></td>
                            <td><?= htmlspecialchars($anggota['alamat']) ?></td>
                            <td><?= htmlspecialchars($anggota['no_hp']) ?></td>
                            <td>
                                <a href="detail.php?no_anggota=<?= urlencode($anggota['no_anggota']) ?>" style="padding: 4px 8px; background: #17a2b8; color: white; text-decoration: none; border-radius: 3px; font-size: 0.9rem;">Detail</a>
                                <a href="edit.php?no_anggota=<?= urlencode($anggota['no_anggota']) ?>" style="padding: 4px 8px; background: #ffc107; color: black; text-decoration: none; border-radius: 3px; font-size: 0.9rem;">Edit</a>
                                <a href="hapus.php?no_anggota=<?= urlencode($anggota['no_anggota']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" style="padding: 4px 8px; background: #dc3545; color: white; text-decoration: none; border-radius: 3px; font-size: 0.9rem;" class="btn-hapus">Hapus</a>
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