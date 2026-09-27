<?php

$targets = [
    'index' => 'jobsheet-09/index.php',
    'barang-list' => 'jobsheet-09/barang/list.php',
    'barang-tambah' => 'jobsheet-09/barang/tambah.php',
    'barang-edit' => 'jobsheet-09/barang/edit.php',
    'barang-proses-edit' => 'jobsheet-09/barang/proses_edit.php',
    'barang-hapus' => 'jobsheet-09/barang/hapus.php',
    'supplier-list' => 'jobsheet-09/supplier/list.php',
    'supplier-tambah' => 'jobsheet-09/supplier/tambah.php',
    'supplier-edit' => 'jobsheet-09/supplier/edit.php',
    'supplier-proses-edit' => 'jobsheet-09/supplier/proses_edit.php',
    'supplier-hapus' => 'jobsheet-09/supplier/hapus.php',
];

$target = $_GET['__target'] ?? '';
if (!isset($targets[$target])) {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

unset($_GET['__target']);
require_once __DIR__ . '/../' . $targets[$target];