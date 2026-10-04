<?php
require_once __DIR__ . '/../includes/security.php';

$returnTo = $_POST['return_to'] ?? $_GET['return_to'] ?? '/jobsheet-12/index.php';
if (!preg_match('#^/(jobsheet-12/|api/jobsheet12\.php(?:\?|$))#', $returnTo) || str_starts_with($returnTo, '//')) {
    $returnTo = '/jobsheet-12/index.php';
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify();
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare('SELECT id, nama_lengkap, username, password, role FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['role'] = $user['role'] ?? '';
        header('Location: ' . $returnTo);
        exit;
    }

    $error = 'Username atau password salah.';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Jobsheet 12</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/jobsheet-12/assets/css/style.css">
</head>
<body class="bg-slate-900 flex items-center justify-center min-h-screen p-4">
    <main class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-slate-900 mb-6 text-center">Login Petugas</h1>
        <?php if ($error): ?><p class="bg-rose-50 border border-rose-200 text-rose-700 p-3 rounded mb-4 text-sm"><?= e($error) ?></p><?php endif; ?>
        <form method="POST" class="space-y-4">
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <input type="hidden" name="return_to" value="<?= e($returnTo) ?>">
            <div><label for="username" class="block text-sm font-medium mb-1">Username</label><input id="username" name="username" required autocomplete="username" class="form-input"></div>
            <div><label for="password" class="block text-sm font-medium mb-1">Password</label><input id="password" type="password" name="password" required autocomplete="current-password" class="form-input"></div>
            <button type="submit" class="btn-primary w-full">Masuk</button>
        </form>
        <p class="text-center text-sm text-gray-500 mt-5">Belum punya akun? <a href="/jobsheet-12/auth/register.php" class="text-amber-700 font-medium hover:underline">Daftar</a></p>
    </main>
</body>
</html>