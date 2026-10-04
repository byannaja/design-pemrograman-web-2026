<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/security.php';

$jenis = $_GET['jenis'] ?? '';
$allowedTypes = ['masuk', 'keluar'];
$sql = "SELECT t.id, t.jenis, t.jumlah, t.catatan, t.created_at, b.kode_barang, b.nama_barang
        FROM transaksi_stok t
        JOIN barang b ON b.id = t.barang_id";

if (in_array($jenis, $allowedTypes, true)) {
    $stmt = $pdo->prepare($sql . ' WHERE t.jenis = ? ORDER BY t.created_at DESC, t.id DESC');
    $stmt->execute([$jenis]);
} else {
    $stmt = $pdo->query($sql . ' ORDER BY t.created_at DESC, t.id DESC');
}
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);
?>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Riwayat Mutasi Stok</h2>
        <p class="text-sm text-gray-500">Semua perubahan stok masuk dan keluar.</p>
    </div>
    <div class="flex gap-3">
        <form method="GET" action="/jobsheet-12/transaksi/list.php" class="flex gap-2">
            <select name="jenis" class="form-input" aria-label="Filter jenis mutasi">
                <option value="">Semua jenis</option>
                <option value="masuk" <?= $jenis === 'masuk' ? 'selected' : '' ?>>Masuk</option>
                <option value="keluar" <?= $jenis === 'keluar' ? 'selected' : '' ?>>Keluar</option>
            </select>
            <button type="submit" class="btn-secondary">Filter</button>
        </form>
        <a href="/jobsheet-12/transaksi/tambah.php" class="btn-primary">Catat Mutasi</a>
    </div>
</div>

<?php if ($flash): ?>
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-lg mb-6 text-sm"><?= e($flash) ?></div>
<?php endif; ?>

<div class="table-container">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead><tr class="bg-slate-100 text-slate-700 text-xs uppercase font-semibold"><th class="py-3 px-4">Waktu</th><th class="py-3 px-4">Kode</th><th class="py-3 px-4">Nama Barang</th><th class="py-3 px-4">Jenis</th><th class="py-3 px-4">Jumlah</th><th class="py-3 px-4">Catatan</th></tr></thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                <?php if (!$transactions): ?>
                    <tr><td colspan="6" class="text-center py-6 text-gray-500">Tidak ada transaksi untuk filter ini.</td></tr>
                <?php else: ?>
                    <?php foreach ($transactions as $row): ?>
                        <tr>
                            <td class="py-3 px-4 whitespace-nowrap"><?= e(date('d-m-Y H:i', strtotime($row['created_at']))) ?></td>
                            <td class="py-3 px-4 font-medium"><?= e($row['kode_barang']) ?></td>
                            <td class="py-3 px-4"><?= e($row['nama_barang']) ?></td>
                            <td class="py-3 px-4"><?= e(ucfirst($row['jenis'])) ?></td>
                            <td class="py-3 px-4"><?= e($row['jumlah']) ?></td>
                            <td class="py-3 px-4"><?= e($row['catatan'] ?: '-') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>