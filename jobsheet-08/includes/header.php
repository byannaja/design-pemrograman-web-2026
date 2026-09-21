<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Toko</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    <!-- Navbar -->
    <header class="bg-slate-900 text-white shadow-md border-b-2 border-amber-500">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide flex items-center gap-2">
                <span class="text-amber-400"></span> Inventaris Toko
            </h1>
            <nav>
                <ul class="flex space-x-6 text-sm font-medium">
                    <li><a href="../index.php" class="hover:text-amber-400 transition">Dashboard</a></li>
                    <li><a href="../barang/list.php" class="hover:text-amber-400 transition">Daftar Barang</a></li>
                    <li><a href="../barang/tambah.php" class="hover:text-amber-400 transition">Tambah Barang</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-4 py-8">