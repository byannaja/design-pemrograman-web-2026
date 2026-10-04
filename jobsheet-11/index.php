<?php
require_once __DIR__ . '/includes/session.php';

require_once __DIR__ . '/includes/koneksi.php';

try {
    $stmtTotal = $pdo->query("SELECT COUNT(*) FROM barang");
    $totalBarang = $stmtTotal->fetchColumn();

    $stmtStok = $pdo->query("SELECT SUM(stok) FROM barang");
    $totalStok = $stmtStok->fetchColumn() ?? 0;

    $stmtAset = $pdo->query("SELECT SUM(stok * harga_satuan) FROM barang");
    $totalAset = $stmtAset->fetchColumn() ?? 0;

    $stmtData = $pdo->query("SELECT * FROM barang ORDER BY id DESC");
    $listBarang = $stmtData->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    $totalBarang = 0;
    $totalStok = 0;
    $totalAset = 0;
    $listBarang = [];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Inventaris Toko</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="/jobsheet-11/assets/css/style.css">
    <script src="/jobsheet-11/assets/js/app.js" defer></script>
</head>

<body class="bg-gray-50 text-gray-800">

<header class="bg-slate-900 text-white shadow-md border-b-2 border-amber-500">

    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center site-header-inner">

        <h1 class="text-xl font-bold tracking-wide">
            Inventaris Toko
        </h1>

        <button type="button" class="mobile-nav-toggle" aria-label="Buka menu navigasi" title="Buka menu navigasi" aria-expanded="false" aria-controls="jobsheet10-navigation" data-mobile-menu-toggle>
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav id="jobsheet10-navigation" class="site-nav" data-mobile-menu>

            <ul class="flex space-x-6 text-sm font-medium items-center">

                <li>
                    <a href="index.php"
                       class="text-amber-400 font-semibold">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="barang/list.php"
                       class="hover:text-amber-400 transition">
                        Daftar Barang
                    </a>
                </li>


                <li>
                    <a href="/jobsheet-11/supplier/list.php"
                       class="hover:text-amber-400 transition">
                        Data Supplier
                    </a>
                </li>

                <li>
                    <a href="/jobsheet-12/index.php" class="hover:text-amber-400 transition">
                        Mutasi Stok
                    </a>
                </li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="text-amber-400 font-semibold">
                        Halo, <?= htmlspecialchars($_SESSION['nama_lengkap'] ?? '') ?>
                    </li>
                    <li>
                        <a href="/jobsheet-11/auth/logout.php" class="bg-rose-600 hover:bg-rose-700 px-3 py-1.5 rounded transition text-white">
                            Logout
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="/jobsheet-11/auth/login.php" class="bg-amber-500 hover:bg-amber-600 px-3 py-1.5 rounded transition text-slate-900 font-semibold">
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="/jobsheet-11/auth/register.php" class="hover:text-amber-400 transition">
                            Daftar
                        </a>
                    </li>
                <?php endif; ?>

            </ul>

        </nav>

    </div>

</header>


<main class="max-w-7xl mx-auto px-4 py-8">

    <div class="mb-8">

        <h2 class="text-2xl font-bold text-slate-900">
            Dashboard Ringkasan Inventaris
        </h2>

        <p class="text-sm text-gray-500">
            Kelola stok barang dan data produk toko dengan mudah.
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

                <a href="/jobsheet-11/barang/tambah.php"
               class="btn-primary">
                Tambah Barang
            </a>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full text-left border-collapse">

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

                            <tr class="hover:bg-gray-50 transition">

                                <td class="py-3 px-6 font-medium text-gray-500">
                                    <?= $no++; ?>
                                </td>

                                <td class="py-3 px-6 font-semibold text-slate-900">
                                    <?= htmlspecialchars($row['nama_barang']); ?>
                                </td>

                                <td class="py-3 px-6">
                                    <?= htmlspecialchars($row['stok']); ?>
                                </td>

                                <td class="py-3 px-6">
                                    Rp <?= number_format($row['harga_satuan'], 0, ',', '.'); ?>
                                </td>

                                <td class="py-3 px-6 font-medium text-amber-600">
                                    Rp <?= number_format(
                                        $row['stok'] * $row['harga_satuan'],
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

                </tbody>

            </table>

        </div>

    </div>

</main>


<footer class="bg-white border-t border-gray-200 mt-12 py-4 text-center text-sm text-gray-500">

    <p>
        &copy; Toserba Prikitiw &mdash; Sistem Manajemen Inventaris
    </p>

</footer>

</body>
</html>