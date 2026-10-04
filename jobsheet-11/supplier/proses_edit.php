<?php
require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $kode = trim($_POST['kode_anggota']);
    $nama = trim($_POST['nama_lengkap']);
    $email = trim($_POST['email']);
    $telepon = trim($_POST['telepon']);

    if ($id && !empty($kode) && !empty($nama) && !empty($email)) {
        try {
            $stmt = $pdo->prepare("UPDATE anggota SET kode_anggota = ?, nama_lengkap = ?, email = ?, telepon = ? WHERE id = ?");
            $stmt->execute([$kode, $nama, $email, $telepon, $id]);
            
            $_SESSION['flash'] = "Data anggota berhasil diperbarui!";
            header("Location: list.php");
            exit;
        } catch (PDOException $e) {
            $_SESSION['error'] = "Gagal memperbarui: Kode anggota atau email mungkin sudah digunakan.";
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