<?php
require_once __DIR__ . '/../includes/security.php';

$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify();
    $name = trim($_POST['nama_lengkap'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name === '' || $username === '' || $password === '') {
        $error = 'Semua kolom wajib diisi.';
    } elseif (strlen($password) < 8) {
        $error = 'Password minimal 8 karakter.';
    } else {
        try {
            $stmt = $pdo->prepare('INSERT INTO users (nama_lengkap, username, password) VALUES (?, ?, ?)');
            $stmt->execute([$name, $username, password_hash($password, PASSWORD_DEFAULT)]);
            $success = 'Pendaftaran berhasil. Silakan login.';
        } catch (PDOException $exception) {
            $error = 'Username sudah digunakan atau data pengguna tidak valid.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jobsheet 12</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/jobsheet-12/assets/css/style.css">
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen p-4">
    <main class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-slate-900 mb-6 text-center">Daftar Petugas</h1>
        <?php if ($error): ?><p class="bg-rose-50 border border-rose-200 text-rose-700 p-3 rounded mb-4 text-sm"><?= e($error) ?></p><?php endif; ?>
        <?php if ($success): ?><p class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-3 rounded mb-4 text-sm"><?= e($success) ?></p><?php endif; ?>
        <form method="POST" class="space-y-4">
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <div><label for="nama_lengkap" class="block text-sm font-medium mb-1">Nama Lengkap</label><input id="nama_lengkap" name="nama_lengkap" required autocomplete="name" class="form-input"></div>
            <div><label for="username" class="block text-sm font-medium mb-1">Username</label><input id="username" name="username" required autocomplete="username" class="form-input"></div>
            <div><label for="password" class="block text-sm font-medium mb-1">Password</label><input id="password" type="password" name="password" minlength="8" required autocomplete="new-password" class="form-input"></div>
            <button type="submit" class="btn-primary w-full">Daftar</button>
        </form>
        <p class="text-center text-sm text-gray-500 mt-5">Sudah punya akun? <a href="/jobsheet-12/auth/login.php" class="text-amber-700 font-medium hover:underline">Login</a></p>
    </main>
</body>
</html>