<?php
session_start();
require_once '../includes/koneksi.php';
$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);

try {
    $stmt = $pdo->query("SELECT * FROM buku ORDER BY id DESC");
    $daftar_buku = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $daftar_buku = [];
    $flash = "Gagal memuat data buku: " . $e->getMessage();
}

include '../includes/header.php';
?>

<section>
    <h2>Daftar Buku (PostgreSQL)</h2>
    
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
                <?php if (empty($daftar_buku)): ?>
                <tr>
                    <td colspan="7" style="text-align: center;">Belum ada data buku di database.</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($daftar_buku as $index => $buku): ?>
                    <tr>
                        <td><?= htmlspecialchars($index + 1) ?></td>
                        <td><?= htmlspecialchars($buku['judul']) ?></td>
                        <td><?= htmlspecialchars($buku['pengarang']) ?></td>
                        <td><?= htmlspecialchars($buku['tahun']) ?></td>
                        <td><?= htmlspecialchars($buku['stok']) ?></td>
                        <td><?= htmlspecialchars($buku['kategori']) ?></td>
                        <td>
                            <a href="detail.php?id=<?= $buku['id'] ?>" style="padding: 4px 8px; background: #17a2b8; color: white; text-decoration: none; border-radius: 3px; font-size: 0.9rem;">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include '../includes/footer.php'; ?>