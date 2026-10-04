<?php
session_start();
require_once __DIR__ . '/../includes/koneksi.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama_lengkap']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (!empty($nama) && !empty($username) && !empty($_POST['password'])) {
        try {
            $stmt = $pdo->prepare("INSERT INTO users (nama_lengkap, username, password) VALUES (?, ?, ?)");
            $stmt->execute([$nama, $username, $password]);
            $success = "Registrasi berhasil! Silakan <a href='login.php' class='underline font-bold'>Login</a>.";
        } catch (PDOException $e) {
            $error = "Username sudah terdaftar, gunakan username lain.";
        }
    } else {
        $error = "Semua kolom wajib diisi!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Petugas Toko</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-slate-900 mb-6 text-center">Registrasi Petugas</h2>
        
        <?php if (!empty($error)): ?>
            <div class="bg-rose-50 border border-rose-200 text-rose-700 p-3 rounded-lg mb-4 text-sm"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-3 rounded-lg mb-4 text-sm"><?= $success ?></div>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
            </div>
            <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-slate-900 font-semibold py-2 rounded-lg transition">Daftar</button>
        </form>
        <p class="text-center text-sm text-gray-500 mt-4">
            Sudah punya akun? <a href="login.php" class="text-amber-600 font-medium hover:underline">Login</a>
        </p>
    </div>
</body>
</html>