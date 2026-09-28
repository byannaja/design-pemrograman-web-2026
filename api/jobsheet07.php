<?php

$targets = [
    'index' => 'jobsheet-07/index.php',
    'anggota-list' => 'jobsheet-07/anggota/list.php',
    'anggota-tambah' => 'jobsheet-07/anggota/tambah.php',
    'anggota-proses-tambah' => 'jobsheet-07/anggota/proses_tambah.php',
];

$target = $_GET['__target'] ?? '';
if (!isset($targets[$target])) {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

unset($_GET['__target']);
require_once __DIR__ . '/../' . $targets[$target];