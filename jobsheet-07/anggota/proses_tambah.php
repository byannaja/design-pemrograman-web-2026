<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_anggota = trim($_POST['no_anggota'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');
    $no_hp = trim($_POST['no_hp'] ?? '');

    // Simpan nilai form sebelumnya jika terjadi error
    $_SESSION['old'] = $_POST;

    // Validasi server-side
    if ($no_anggota === '' || $nama === '' || $alamat === '' || $no_hp === '') {
        $_SESSION['error'] = 'Semua field wajib diisi!';
        header('Location: tambah.php');
        exit;
    }

    // Validasi nomor HP menggunakan preg_match (Sesuai ide latihan lanjutan)
    if (!preg_match('/^[0-9]+$/', $no_hp)) {
        $_SESSION['error'] = 'No. HP hanya boleh berisi angka.';
        header('Location: tambah.php');
        exit;
    }

    if (!isset($_SESSION['anggota'])) {
        $_SESSION['anggota'] = [];
    }

    // Tambahkan data baru ke session anggota
    $_SESSION['anggota'][] = [
        "no_anggota" => $no_anggota,
        "nama" => $nama,
        "alamat" => $alamat,
        "no_hp" => $no_hp
    ];

    // Bersihkan sesi error dan old
    unset($_SESSION['error'], $_SESSION['old']);

    // Set flash message sukses
    $_SESSION['flash'] = 'Anggota berhasil ditambahkan.';

    // Redirect ke list anggota
    header('Location: list.php');
    exit;
} else {
    header('Location: tambah.php');
    exit;
}