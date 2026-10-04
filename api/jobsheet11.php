<?php

$targets = [
    'index' => 'jobsheet-11/index.php',
    'barang-list' => 'jobsheet-11/barang/list.php',
    'barang-tambah' => 'jobsheet-11/barang/tambah.php',
    'barang-edit' => 'jobsheet-11/barang/edit.php',
    'barang-proses-edit' => 'jobsheet-11/barang/proses_edit.php',
    'barang-hapus' => 'jobsheet-11/barang/hapus.php',
    'supplier-list' => 'jobsheet-11/supplier/list.php',
    'supplier-tambah' => 'jobsheet-11/supplier/tambah.php',
    'supplier-edit' => 'jobsheet-11/supplier/edit.php',
    'supplier-proses-edit' => 'jobsheet-11/supplier/proses_edit.php',
    'supplier-hapus' => 'jobsheet-11/supplier/hapus.php',
    'auth-login' => 'jobsheet-11/auth/login.php',
    'auth-register' => 'jobsheet-11/auth/register.php',
    'auth-logout' => 'jobsheet-11/auth/logout.php',
];

$target = $_GET['__target'] ?? '';
if (!isset($targets[$target])) {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

unset($_GET['__target']);
require_once __DIR__ . '/../' . $targets[$target];