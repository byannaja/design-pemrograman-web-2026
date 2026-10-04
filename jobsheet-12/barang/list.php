<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/security.php';

$stmt = $pdo->query('SELECT id, kode_barang, nama_barang, kategori, stok, harga_satuan FROM barang ORDER BY nama_barang');
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="flex flex-col sm:flex-row justify-between sm:items-center gap-3 mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Data Barang</h2>
        <p class="text-sm text-gray-500">Stok terkini untuk barang yang dapat dimutasi.</p>
    </div>
    <a href="/jobsheet-12/transaksi/tambah.php" class="btn-primary">Catat Mutasi</a>
</div>

<div class="table-container">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead><tr class="bg-slate-100 text-slate-700 text-xs uppercase font-semibold"><th class="py-3 px-4">Kode</th><th class="py-3 px-4">Nama Barang</th><th class="py-3 px-4">Kategori</th><th class="py-3 px-4">Stok</th><th class="py-3 px-4">Harga</th></tr></thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                <?php if (!$items): ?>
                    <tr><td colspan="5" class="text-center py-6 text-gray-500">Belum ada data barang.</td></tr>
                <?php else: ?>
                    <?php foreach ($items as $item): ?>
                        <tr><td class="py-3 px-4 font-medium"><?= e($item['kode_barang']) ?></td><td class="py-3 px-4"><?= e($item['nama_barang']) ?></td><td class="py-3 px-4"><?= e($item['kategori']) ?></td><td class="py-3 px-4"><?= e($item['stok']) ?></td><td class="py-3 px-4">Rp <?= number_format((float) $item['harga_satuan'], 0, ',', '.') ?></td></tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>