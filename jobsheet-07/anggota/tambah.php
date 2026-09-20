<?php
session_start();
$error = $_SESSION['error'] ?? '';
$old = $_SESSION['old'] ?? [];
unset($_SESSION['error'], $_SESSION['old']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota - SIMPUS-Mini</title>
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
            <h2>Tambah Anggota</h2>

            <?php if (!empty($error)): ?>
                <div class="error" style="background-color: #f2dede; color: #a94442; padding: 0.75rem; margin-bottom: 1rem; border-radius: 4px;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="proses_tambah.php" method="POST">
                <p>
                    <label for="no_anggota">No. Anggota</label>
                    <input type="text" id="no_anggota" name="no_anggota" value="<?= htmlspecialchars($old['no_anggota'] ?? '') ?>" required>
                </p>
                <p>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($old['nama'] ?? '') ?>" required>
                </p>
                <p>
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="<?= htmlspecialchars($old['alamat'] ?? '') ?>" required>
                </p>
                <p>
                    <label for="no_hp">No. HP</label>
                    <input type="text" id="no_hp" name="no_hp" value="<?= htmlspecialchars($old['no_hp'] ?? '') ?>" required>
                </p>
                <p>
                    <button type="submit">Simpan</button>
                </p>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 SIMPUS-Mini &mdash; Jobsheet 7</p>
    </footer>

    <script src="../assets/js/app.js"></script>
</body>
</html>