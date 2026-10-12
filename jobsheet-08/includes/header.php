<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Toko</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="/jobsheet-08/assets/css/style.css">
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    <header class="bg-slate-900 text-white shadow-md border-b-2 border-amber-500">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center nav-header-inner">

            <h1 class="text-xl font-bold tracking-wide flex items-center gap-2">
                Inventaris Toko
            </h1>

            <button
                type="button"
                class="nav-toggle"
                id="nav-toggle"
                aria-label="Buka menu navigasi"
                aria-controls="primary-navigation"
                aria-expanded="false"
            >
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <span>Menu</span>
            </button>

            <nav id="primary-navigation">
                <ul class="flex space-x-6 text-sm font-medium">

                    <li>
                        <a href="/jobsheet-08/index.php" class="<?= ($currentPage ?? '') === 'dashboard' ? 'text-amber-400 font-semibold' : 'hover:text-amber-400 transition' ?>">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="/jobsheet-08/barang/list.php" class="<?= ($currentPage ?? '') === 'barang' ? 'text-amber-400 font-semibold' : 'hover:text-amber-400 transition' ?>">
                            Daftar Barang
                        </a>
                    </li>

                    <li>
                        <a href="/jobsheet-08/barang/tambah.php" class="<?= ($currentPage ?? '') === 'tambah' ? 'text-amber-400 font-semibold' : 'hover:text-amber-400 transition' ?>">
                            Tambah Barang
                        </a>
                    </li>

                </ul>
            </nav>

        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">