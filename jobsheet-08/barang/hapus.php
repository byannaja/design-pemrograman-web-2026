<?php
session_start();
require_once __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM barang WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['flash'] = "Data barang berhasil dihapus!";
}

header("Location: list.php");
exit;