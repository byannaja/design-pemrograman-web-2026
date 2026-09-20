<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul'] ?? '');
    $pengarang = trim($_POST['pengarang'] ?? '');
    $tahun = (int)($_POST['tahun'] ?? 0);
    $stok = (int)($_POST['stok'] ?? -1);
    $kategori = trim($_POST['kategori'] ?? '');

    // Simpan data lama untuk form jika terjadi error
    $_SESSION['old'] = $_POST;

    // Validasi server-side
    if ($judul === '' || $pengarang === '' || $kategori === '') {
        $_SESSION['error'] = 'Semua field teks wajib diisi!';
        header('Location: tambah.php');
        exit;
    }

    if ($tahun < 1900 || $tahun > 2026) {
        $_SESSION['error'] = 'Tahun terbit harus di antara 1900 dan 2026.';
        header('Location: tambah.php');
        exit;
    }

    if ($stok < 0) {
        $_SESSION['error'] = 'Stok tidak boleh bernilai negatif.';
        header('Location: tambah.php');
        exit;
    }

    // Pastikan session data buku sudah ada
    if (!isset($_SESSION['buku'])) {
        $_SESSION['buku'] = [];
    }

    $no_baru = count($_SESSION['buku']) + 1;

    // Masukkan data baru ke array session buku
    $_SESSION['buku'][] = [
        "no" => $no_baru,
        "judul" => $judul,
        "pengarang" => $pengarang,
        "tahun" => $tahun,
        "stok" => $stok,
        "kategori" => $kategori
    ];

    // Bersihkan old dan error karena sukses
    unset($_SESSION['old'], $_SESSION['error']);

    // Set flash message sukses
    $_SESSION['flash'] = 'Buku berhasil ditambahkan.';

    // Redirect ke halaman list
    header('Location: list.php');
    exit;
} else {
    header('Location: tambah.php');
    exit;
}