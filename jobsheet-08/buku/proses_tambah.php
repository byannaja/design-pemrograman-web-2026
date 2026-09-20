<?php
session_start();
require_once '../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'] ?? '';
    $pengarang = $_POST['pengarang'] ?? '';
    $tahun = $_POST['tahun'] ?? '';
    $stok = $_POST['stok'] ?? '';
    $kategori = $_POST['kategori'] ?? '';

    try {
        $sql = "INSERT INTO buku (judul, pengarang, tahun, stok, kategori) VALUES (:judul, :pengarang, :tahun, :stok, :kategori)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':judul' => $judul,
            ':pengarang' => $pengarang,
            ':tahun' => $tahun,
            ':stok' => $stok,
            ':kategori' => $kategori
        ]);

        $_SESSION['flash'] = "Buku berhasil ditambahkan ke database!";
        header('Location: list.php');
        exit;
    } catch (PDOException $e) {
        $_SESSION['flash'] = "Gagal menambah buku: " . $e->getMessage();
        header('Location: tambah.php');
        exit;
    }
}