<?php

$targets = [
    'index' => 'jobsheet-12/index.php',
    'barang-list' => 'jobsheet-12/barang/list.php',
    'auth-login' => 'jobsheet-12/auth/login.php',
    'auth-register' => 'jobsheet-12/auth/register.php',
    'auth-logout' => 'jobsheet-12/auth/logout.php',
    'transaksi-list' => 'jobsheet-12/transaksi/list.php',
    'transaksi-tambah' => 'jobsheet-12/transaksi/tambah.php',
    'transaksi-proses-tambah' => 'jobsheet-12/transaksi/proses_tambah.php',
];

$target = $_GET['__target'] ?? '';
if (!isset($targets[$target])) {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

unset($_GET['__target']);
require_once __DIR__ . '/../' . $targets[$target];