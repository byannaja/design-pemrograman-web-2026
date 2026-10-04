<?php
require_once __DIR__ . '/../jobsheet-11/includes/session.php';
require_once __DIR__ . '/../jobsheet-11/includes/auth.php';
require_once __DIR__ . '/../jobsheet-11/includes/koneksi.php';
require_once __DIR__ . '/../jobsheet-11/includes/security.php';

$stmtSummary = $pdo->query(
    "SELECT COUNT(*) AS total,
        COALESCE(SUM(CASE WHEN jenis = 'masuk' THEN jumlah ELSE 0 END), 0) AS masuk,
        COALESCE(SUM(CASE WHEN jenis = 'keluar' THEN jumlah ELSE 0 END), 0) AS keluar
     FROM transaksi_stok"
);
$summary = $stmtSummary->fetch(PDO::FETCH_ASSOC);

$stmtRecent = $pdo->query(
    "SELECT t.jenis, t.jumlah, t.catatan, t.created_at, b.kode_barang, b.nama_barang
     FROM transaksi_stok t
     JOIN barang b ON b.id = t.barang_id
     ORDER BY t.created_at DESC, t.id DESC
     LIMIT 8"
);
$recent = $stmtRecent->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include __DIR__ . '/../jobsheet-11/includes/header.php'; ?>

<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Mutasi Stok Barang</h2>
        <p class="text-sm text-gray-500">Catat barang masuk dan keluar dengan riwayat yang terlacak.</p>
    </div>
    <div class="flex gap-3">
        <a href="/jobsheet-12/transaksi/list.php" class="btn-secondary">Riwayat Mutasi</a>
        <a href="/jobsheet-12/transaksi/tambah.php" class="btn-primary">Catat Mutasi</a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="card-stat"><div><p class="text-sm font-medium text-gray-500">Total Transaksi</p><h3 class="text-3xl font-bold text-slate-900 mt-1"><?= e($summary['total']) ?></h3></div></div>
    <div class="card-stat"><div><p class="text-sm font-medium text-gray-500">Unit Masuk</p><h3 class="text-3xl font-bold text-emerald-700 mt-1"><?= e($summary['masuk']) ?></h3></div></div>
    <div class="card-stat"><div><p class="text-sm font-medium text-gray-500">Unit Keluar</p><h3 class="text-3xl font-bold text-rose-700 mt-1"><?= e($summary['keluar']) ?></h3></div></div>
</div>

<div class="table-container">
    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
        <h3 class="font-bold text-slate-900 text-lg">Mutasi Terbaru</h3>
        <a href="/jobsheet-12/transaksi/list.php" class="text-sm text-amber-700 hover:underline">Lihat semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead><tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200"><th class="py-3 px-6">Waktu</th><th class="py-3 px-6">Barang</th><th class="py-3 px-6">Jenis</th><th class="py-3 px-6">Jumlah</th><th class="py-3 px-6">Catatan</th></tr></thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                <?php if (!$recent): ?>
                    <tr><td colspan="5" class="py-6 px-6 text-center text-gray-500">Belum ada mutasi stok.</td></tr>
                <?php else: ?>
                    <?php foreach ($recent as $row): ?>
                        <tr>
                            <td class="py-3 px-6"><?= e(date('d-m-Y H:i', strtotime($row['created_at']))) ?></td>
                            <td class="py-3 px-6"><span class="font-medium"><?= e($row['nama_barang']) ?></span><span class="block text-xs text-gray-500"><?= e($row['kode_barang']) ?></span></td>
                            <td class="py-3 px-6"><?= e(ucfirst($row['jenis'])) ?></td>
                            <td class="py-3 px-6 font-semibold"><?= e($row['jumlah']) ?></td>
                            <td class="py-3 px-6"><?= e($row['catatan'] ?: '-') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../jobsheet-11/includes/footer.php'; ?>