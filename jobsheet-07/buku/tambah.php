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
    <title>Tambah Buku - SIMPUS-Mini</title>
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
            <h2>Tambah Buku</h2>

            <?php if (!empty($error)): ?>
                <div class="error" style="background-color: #f2dede; color: #a94442; padding: 0.75rem; margin-bottom: 1rem; border-radius: 4px;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="proses_tambah.php" method="POST">
                <p>
                    <label for="judul">Judul</label>
                    <input type="text" id="judul" name="judul" value="<?= htmlspecialchars($old['judul'] ?? '') ?>" required>
                </p>
                <p>
                    <label for="pengarang">Pengarang</label>
                    <input type="text" id="pengarang" name="pengarang" value="<?= htmlspecialchars($old['pengarang'] ?? '') ?>" required>
                </p>
                <p>
                    <label for="tahun">Tahun Terbit</label>
                    <input type="number" id="tahun" name="tahun" min="1900" max="2026" value="<?= htmlspecialchars($old['tahun'] ?? '') ?>" required>
                </p>
                <p>
                    <label for="stok">Stok</label>
                    <input type="number" id="stok" name="stok" min="0" value="<?= htmlspecialchars($old['stok'] ?? '') ?>" required>
                </p>
                <p>
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" value="<?= htmlspecialchars($old['kategori'] ?? '') ?>" required>
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