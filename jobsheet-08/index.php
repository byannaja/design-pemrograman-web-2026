<?php
session_start();
require_once __DIR__ . '/includes/koneksi.php';

try {
    $stmtTotal = $pdo->query("SELECT COUNT(*) FROM barang");
    $totalBarang = $stmtTotal->fetchColumn();

    $stmtStok = $pdo->query("SELECT SUM(stok) FROM barang");
    $totalStok = $stmtStok->fetchColumn() ?? 0;

    $stmtAset = $pdo->query("SELECT SUM(stok * harga_satuan) FROM barang");
    $totalAset = $stmtAset->fetchColumn() ?? 0;

    $stmtData = $pdo->query("SELECT * FROM barang ORDER BY id DESC");
    $listBarang = $stmtData->fetchAll();
} catch (Exception $e) {
    $totalBarang = 0;
    $totalStok = 0;
    $totalAset = 0;
    $listBarang = [];
}
$currentPage = 'dashboard';
include __DIR__ . '/includes/header.php';
?>

        <div class="mb-8">
            <h2 class="text-2xl font-bold text-slate-900">
                Dashboard Ringkasan Inventaris
            </h2>

            <p class="text-sm text-gray-500">
                Kelola stok barang masuk dan data produk toko dengan mudah.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

            <div class="card-stat">
                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Jenis Barang
                    </p>

                    <h3 class="text-3xl font-bold text-slate-900 mt-1">
                        <?= $totalBarang; ?>
                    </h3>
                </div>
            </div>

            <div class="card-stat">
                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Total Stok Keseluruhan
                    </p>

                    <h3 class="text-3xl font-bold text-slate-900 mt-1">
                        <?= $totalStok; ?>
                    </h3>
                </div>
            </div>

            <div class="card-stat">
                <div>
                    <p class="text-sm font-medium text-gray-500">
                        Estimasi Nilai Aset
                    </p>

                    <h3 class="text-3xl font-bold text-amber-600 mt-1">
                        Rp <?= number_format($totalAset, 0, ',', '.'); ?>
                    </h3>
                </div>
            </div>

        </div>

        <div class="table-container">

            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">

                <h3 class="font-bold text-slate-900 text-lg">
                    Daftar Barang Terbaru
                </h3>

                <a href="/jobsheet-08/barang/tambah.php"
                   class="btn-primary">
                    Tambah Barang
                </a>

            </div>

            <div class="search-controls px-6 pt-4">
                <div class="flex-1">
                    <label for="dashboard-search">Cari data barang</label>
                    <input
                        type="search"
                        id="dashboard-search"
                        placeholder="Cari nama, stok, atau harga..."
                        data-search-table="dashboard-table"
                        <?= empty($listBarang) ? 'disabled' : '' ?>
                    >
                </div>
                <p class="search-status" data-search-status="dashboard-table" aria-live="polite">
                    <?= count($listBarang) ?> barang tersedia.
                </p>
            </div>

            <div class="overflow-x-auto">

                <table id="dashboard-table" class="w-full text-left border-collapse">

                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-200">

                            <th class="py-3 px-6">
                                No
                            </th>

                            <th class="py-3 px-6">
                                Nama Barang
                            </th>

                            <th class="py-3 px-6">
                                Stok
                            </th>

                            <th class="py-3 px-6">
                                Harga Satuan
                            </th>

                            <th class="py-3 px-6">
                                Total Nilai
                            </th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 text-sm">

                        <?php if (!empty($listBarang)): ?>

                            <?php $no = 1; ?>

                            <?php foreach ($listBarang as $row): ?>

                                <tr class="hover:bg-gray-50 transition" data-search-row>

                                    <td class="py-3 px-6 font-medium text-gray-500">
                                        <?= $no++; ?>
                                    </td>

                                    <td class="py-3 px-6 font-semibold text-slate-900" data-searchable>
                                        <?= htmlspecialchars($row['nama_barang'] ?? ''); ?>
                                    </td>

                                    <td class="py-3 px-6" data-searchable>
                                        <?= htmlspecialchars($row['stok'] ?? 0); ?>
                                    </td>

                                    <td class="py-3 px-6" data-searchable>
                                        Rp <?= number_format($row['harga_satuan'] ?? 0, 0, ',', '.'); ?>
                                    </td>

                                    <td class="py-3 px-6 font-medium text-amber-600" data-searchable>
                                        Rp <?= number_format(
                                            ($row['stok'] ?? 0) * ($row['harga_satuan'] ?? 0),
                                            0,
                                            ',',
                                            '.'
                                        ); ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="5"
                                    class="py-6 text-center text-gray-400">
                                    Belum ada data barang di database.
                                </td>

                            </tr>

                        <?php endif; ?>
                        <?php if (!empty($listBarang)): ?>
                            <tr data-search-empty hidden>
                                <td colspan="5" class="py-6 text-center text-gray-400">
                                    Barang yang dicari tidak ditemukan.
                                </td>
                            </tr>
                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

<?php include __DIR__ . '/includes/footer.php'; ?>