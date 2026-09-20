<?php
session_start();
$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);
include '../includes/header.php';
?>

<section>
    <h2>Tambah Buku Baru</h2>

    <?php if (!empty($flash)): ?>
        <div class="flash-message" style="background-color: #f2dede; color: #a94442; padding: 0.75rem; margin-bottom: 1rem; border-radius: 4px;">
            <?= htmlspecialchars($flash) ?>
        </div>
    <?php endif; ?>

    <form action="proses_tambah.php" method="POST" style="max-width: 500px;">
        <div style="margin-bottom: 10px;">
            <label>Judul Buku:</label><br>
            <input type="text" name="judul" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label>Pengarang:</label><br>
            <input type="text" name="pengarang" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label>Tahun Terbit:</label><br>
            <input type="number" name="tahun" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label>Stok:</label><br>
            <input type="number" name="stok" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Kategori:</label><br>
            <input type="text" name="kategori" required style="width: 100%; padding: 8px;">
        </div>
        <button type="submit" style="padding: 10px 15px; background: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px;">Simpan Buku</button>
        <a href="list.php" style="margin-left: 10px; text-decoration: none; color: #555;">Batal</a>
    </form>
</section>

<?php include '../includes/footer.php'; ?>