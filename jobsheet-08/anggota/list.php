<?php
session_start();
require_once '../includes/koneksi.php';
$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);

try {
    $stmt = $pdo->query("SELECT * FROM anggota ORDER BY no_anggota ASC");
    $daftar_anggota = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $daftar_anggota = [];
    $flash = "Gagal memuat data anggota: " . $e->getMessage();
}

include '../includes/header.php';
?>

<section>
    <h2>Daftar Anggota (PostgreSQL)</h2>
    
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
                <?php if (empty($daftar_anggota)): ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada data anggota di database.</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($daftar_anggota as $anggota): ?>
                    <tr>
                        <td><?= htmlspecialchars($anggota['no_anggota']) ?></td>
                        <td><?= htmlspecialchars($anggota['nama']) ?></td>
                        <td><?= htmlspecialchars($anggota['alamat']) ?></td>
                        <td><?= htmlspecialchars($anggota['no_hp']) ?></td>
                        <td>
                            <a href="detail.php?no_anggota=<?= urlencode($anggota['no_anggota']) ?>" style="padding: 4px 8px; background: #17a2b8; color: white; text-decoration: none; border-radius: 3px; font-size: 0.9rem;">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include '../includes/footer.php'; ?>