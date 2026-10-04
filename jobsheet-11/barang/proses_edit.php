<?php
require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/koneksi.php';
require_once __DIR__ . '/../includes/security.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    csrf_verify(); // Verifikasi CSRF

    $id = $_POST['id'] ?? null;
    $kode = trim($_POST['kode_barang']);
    $nama = trim($_POST['nama_barang']);
    $kategori = trim($_POST['kategori']);
    $stok = intval($_POST['stok']);
    $harga = floatval($_POST['harga_satuan']);

    if ($id && !empty($kode) && !empty($nama) && !empty($kategori)) {
        try {
            $stmt = $pdo->prepare("UPDATE barang SET kode_barang = ?, nama_barang = ?, kategori = ?, stok = ?, harga_satuan = ? WHERE id = ?");
            $stmt->execute([$kode, $nama, $kategori, $stok, $harga, $id]);
            
            $_SESSION['flash'] = "Data barang berhasil diperbarui!";
            header("Location: list.php");
            exit;
        } catch (PDOException $e) {
            $_SESSION['error'] = "Gagal memperbarui: Kode barang mungkin sudah digunakan.";
            header("Location: edit.php?id=" . $id);
            exit;
        }
    } else {
        $_SESSION['error'] = "Semua kolom wajib diisi!";
        header("Location: edit.php?id=" . $id);
        exit;
    }
} else {
    header("Location: list.php");
    exit;
}