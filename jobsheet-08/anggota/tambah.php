<?php
session_start();
$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);
include '../includes/header.php';
?>

<section>
    <h2>Tambah Anggota Baru</h2>

    <?php if (!empty($flash)): ?>
        <div class="flash-message" style="background-color: #f2dede; color: #a94442; padding: 0.75rem; margin-bottom: 1rem; border-radius: 4px;">
            <?= htmlspecialchars($flash) ?>
        </div>
    <?php endif; ?>

    <form action="proses_tambah.php" method="POST" style="max-width: 500px;">
        <div style="margin-bottom: 10px;">
            <label>No Anggota:</label><br>
            <input type="text" name="no_anggota" required style="width: 100%; padding: 8px;" placeholder="Contoh: A011">
        </div>
        <div style="margin-bottom: 10px;">
            <label>Nama:</label><br>
            <input type="text" name="nama" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 10px;">
            <label>Alamat:</label><br>
            <input type="text" name="alamat" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>No HP:</label><br>
            <input type="text" name="no_hp" required style="width: 100%; padding: 8px;">
        </div>
        <button type="submit" style="padding: 10px 15px; background: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px;">Simpan Anggota</button>
        <a href="list.php" style="margin-left: 10px; text-decoration: none; color: #555;">Batal</a>
    </form>
</section>

<?php include '../includes/footer.php'; ?>