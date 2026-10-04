<?php
require_once __DIR__ . '/session.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutasi Stok - Inventaris Toko</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/jobsheet-12/assets/css/style.css">
    <script src="/jobsheet-12/assets/js/app.js" defer></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">
<header class="bg-slate-900 text-white shadow-md border-b-2 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center site-header-inner">
        <a href="/jobsheet-12/index.php" class="text-xl font-bold tracking-wide">Inventaris Toko</a>
        <button type="button" class="mobile-nav-toggle" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="jobsheet12-navigation" data-mobile-menu-toggle>
            <span></span><span></span><span></span>
        </button>
        <nav id="jobsheet12-navigation" class="site-nav" data-mobile-menu>
            <ul class="flex space-x-6 text-sm font-medium items-center">
                <li><a href="/jobsheet-12/index.php" class="hover:text-amber-400 transition">Dashboard</a></li>
                <li><a href="/jobsheet-12/barang/list.php" class="hover:text-amber-400 transition">Data Barang</a></li>
                <li><a href="/jobsheet-12/transaksi/list.php" class="hover:text-amber-400 transition">Riwayat Mutasi</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="text-amber-400 font-semibold">Halo, <?= htmlspecialchars($_SESSION['nama_lengkap'] ?? '', ENT_QUOTES, 'UTF-8') ?></li>
                    <li><a href="/jobsheet-12/auth/logout.php" class="bg-rose-600 hover:bg-rose-700 px-3 py-1.5 rounded text-white">Logout</a></li>
                <?php else: ?>
                    <li><a href="/jobsheet-12/auth/login.php" class="bg-amber-500 hover:bg-amber-600 px-3 py-1.5 rounded text-slate-900">Login</a></li>
                    <li><a href="/jobsheet-12/auth/register.php" class="hover:text-amber-400 transition">Daftar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
<main class="max-w-7xl mx-auto px-4 py-8">