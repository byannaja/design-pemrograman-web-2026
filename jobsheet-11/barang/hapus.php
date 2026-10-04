<?php
require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/koneksi.php';
require_once __DIR__ . '/../includes/security.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify(); // Verifikasi CSRF untuk aksi hapus

    $id = $_POST['id'] ?? null;
    if ($id) {
        $stmt = $pdo->prepare("DELETE FROM barang WHERE id = ?");
        $stmt->execute([$id]);
        $_SESSION['flash'] = "Data barang berhasil dihapus!";
    }
}

header("Location: list.php");
exit;