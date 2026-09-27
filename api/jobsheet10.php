<?php

$targets = [
    'index' => 'jobsheet-10/index.php',
    'barang-list' => 'jobsheet-10/barang/list.php',
    'barang-tambah' => 'jobsheet-10/barang/tambah.php',
    'barang-edit' => 'jobsheet-10/barang/edit.php',
    'barang-proses-edit' => 'jobsheet-10/barang/proses_edit.php',
    'barang-hapus' => 'jobsheet-10/barang/hapus.php',
    'supplier-list' => 'jobsheet-10/supplier/list.php',
    'supplier-tambah' => 'jobsheet-10/supplier/tambah.php',
    'supplier-edit' => 'jobsheet-10/supplier/edit.php',
    'supplier-proses-edit' => 'jobsheet-10/supplier/proses_edit.php',
    'supplier-hapus' => 'jobsheet-10/supplier/hapus.php',
    'auth-login' => 'jobsheet-10/auth/login.php',
    'auth-register' => 'jobsheet-10/auth/register.php',
    'auth-logout' => 'jobsheet-10/auth/logout.php',
];

$target = $_GET['__target'] ?? '';
if (!isset($targets[$target])) {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

unset($_GET['__target']);
require_once __DIR__ . '/../' . $targets[$target];