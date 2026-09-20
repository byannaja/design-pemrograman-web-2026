<?php
session_start();
require_once '../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_anggota = $_POST['no_anggota'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $no_hp = $_POST['no_hp'] ?? '';

    try {
        $sql = "INSERT INTO anggota (no_anggota, nama, alamat, no_hp) VALUES (:no_anggota, :nama, :alamat, :no_hp)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':no_anggota' => $no_anggota,
            ':nama' => $nama,
            ':alamat' => $alamat,
            ':no_hp' => $no_hp
        ]);

        $_SESSION['flash'] = "Anggota baru berhasil didaftarkan!";
        header('Location: list.php');
        exit;
    } catch (PDOException $e) {
        if ($e->getCode() == '23505') {
            $_SESSION['flash'] = "Nomor Anggota '{$no_anggota}' sudah dipakai, silakan gunakan nomor lain.";
        } else {
            $_SESSION['flash'] = "Terjadi kesalahan pada database: " . $e->getMessage();
        }
        header('Location: tambah.php');
        exit;
    }
}