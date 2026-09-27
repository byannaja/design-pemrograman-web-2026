<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Inventaris & Toko</title>

    <!-- Tailwind CSS v4 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- CSS Kustom -->
    <link rel="stylesheet" href="/jobsheet-09/assets/css/style.css">

    <!-- JavaScript untuk Konfirmasi Hapus -->
    <script src="/jobsheet-09/assets/js/app.js" defer></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    <header class="bg-slate-900 text-white shadow-md border-b-2 border-amber-500">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">

            <h1 class="text-xl font-bold tracking-wide flex items-center gap-2">
                Inventaris & Toko
            </h1>

            <nav>
                <ul class="flex space-x-6 text-sm font-medium items-center">
                    <li>
                        <a href="/jobsheet-09/index.php" class="hover:text-amber-400 transition">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/jobsheet-09/barang/list.php" class="hover:text-amber-400 transition">
                            Data Barang
                        </a>
                    </li>
                    <li>
                        <a href="/jobsheet-09/supplier/list.php" class="hover:text-amber-400 transition">
                            Data Supplier
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">