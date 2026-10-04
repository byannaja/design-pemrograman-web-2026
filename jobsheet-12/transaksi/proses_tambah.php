<?php
session_start();
require_once __DIR__ . '/../../jobsheet-11/includes/auth.php';
require_once __DIR__ . '/../../jobsheet-11/includes/koneksi.php';
require_once __DIR__ . '/../../jobsheet-11/includes/security.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /jobsheet-12/transaksi/tambah.php');
    exit;
}

csrf_verify();

$barangId = filter_var($_POST['barang_id'] ?? null, FILTER_VALIDATE_INT);
$jumlah = filter_var($_POST['jumlah'] ?? null, FILTER_VALIDATE_INT);
$jenis = $_POST['jenis'] ?? '';
$catatan = trim($_POST['catatan'] ?? '');

if (!$barangId || !$jumlah || $jumlah < 1 || !in_array($jenis, ['masuk', 'keluar'], true)) {
    $_SESSION['form_error'] = 'Barang, jenis mutasi, atau jumlah tidak valid.';
    header('Location: /jobsheet-12/transaksi/tambah.php');
    exit;
}

try {
    $pdo->beginTransaction();

    $stmtStock = $pdo->prepare('SELECT stok FROM barang WHERE id = ? FOR UPDATE');
    $stmtStock->execute([$barangId]);
    $barang = $stmtStock->fetch(PDO::FETCH_ASSOC);

    if (!$barang) {
        throw new RuntimeException('Barang tidak ditemukan.');
    }

    $stokBaru = (int) $barang['stok'];
    if ($jenis === 'keluar') {
        if ($stokBaru < $jumlah) {
            throw new RuntimeException('Stok barang tidak mencukupi untuk mutasi keluar.');
        }
        $stokBaru -= $jumlah;
    } else {
        $stokBaru += $jumlah;
    }

    $stmtUpdate = $pdo->prepare('UPDATE barang SET stok = ? WHERE id = ?');
    $stmtUpdate->execute([$stokBaru, $barangId]);

    $stmtInsert = $pdo->prepare(
        'INSERT INTO transaksi_stok (barang_id, jenis, jumlah, catatan) VALUES (?, ?, ?, ?)'
    );
    $stmtInsert->execute([$barangId, $jenis, $jumlah, $catatan !== '' ? $catatan : null]);

    $pdo->commit();
    $_SESSION['flash'] = 'Mutasi stok berhasil disimpan.';
    header('Location: /jobsheet-12/transaksi/list.php');
    exit;
} catch (Throwable $error) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    if ($error instanceof PDOException) {
        error_log($error->getMessage());
        $_SESSION['form_error'] = 'Mutasi gagal disimpan. Periksa tabel transaksi dan koneksi database.';
    } else {
        $_SESSION['form_error'] = $error->getMessage();
    }

    header('Location: /jobsheet-12/transaksi/tambah.php');
    exit;
}