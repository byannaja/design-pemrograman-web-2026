<?php
session_start();
require_once '../includes/koneksi.php';
$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);

$stmt = $pdo->query("SELECT * FROM barang ORDER BY id DESC");
$daftar_barang = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include '../includes/header.php'; ?>

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Daftar Barang Inventaris</h2>
        <p class="text-sm text-gray-500">Berikut adalah daftar seluruh barang yang tersedia di toko.</p>
    </div>
    <a href="tambah.php" class="btn-primary">
        + Tambah Barang Baru
    </a>
</div>

<?php if (!empty($flash)): ?>
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-lg mb-6 text-sm">
        <?= htmlspecialchars($flash) ?>
    </div>
<?php endif; ?>

<div class="table-container">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-100 text-slate-700 text-xs uppercase font-semibold tracking-wider">
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Kode Barang</th>
                    <th class="py-3 px-4">Nama Barang</th>
                    <th class="py-3 px-4">Kategori</th>
                    <th class="py-3 px-4">Stok</th>
                    <th class="py-3 px-4">Harga Satuan</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                <?php if (empty($daftar_barang)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-500">Belum ada data barang.</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($daftar_barang as $b): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4"><?= $no++; ?></td>
                        <td class="py-3 px-4 font-medium text-slate-900"><?= htmlspecialchars($b['kode_barang']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($b['nama_barang']) ?></td>
                        <td class="py-3 px-4">
                            <span class="bg-slate-100 text-slate-700 px-2.5 py-1 rounded-full text-xs font-medium">
                                <?= htmlspecialchars($b['kategori']) ?>
                            </span>
                        </td>
                        <td class="py-3 px-4"><?= htmlspecialchars($b['stok']) ?></td>
                        <td class="py-3 px-4">Rp <?= number_format($b['harga_satuan'], 0, ',', '.') ?></td>
                        <td class="py-3 px-4 text-center space-x-2">
                            <a href="edit.php?id=<?= $b['id'] ?>" class="btn-info">Edit</a>
                            <a href="hapus.php?id=<?= $b['id'] ?>" onclick="return confirm('Yakin ingin menghapus barang ini?')" class="btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>