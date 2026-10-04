<?php
require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    if ($id) {
        $stmt = $pdo->prepare("DELETE FROM anggota WHERE id = ?");
        $stmt->execute([$id]);
        $_SESSION['flash'] = "Data anggota berhasil dihapus!";
    }
}

header("Location: list.php");
exit;