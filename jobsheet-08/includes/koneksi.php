<?php
$host = "postgres";
$port = "5432";
$dbname = "simpus_mini";
$user = "postgres";
$password = "12345";

try {
    // Menggunakan PDO untuk koneksi PostgreSQL
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    // Set error mode ke exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Koneksi ke database simpus_mini berhasil!";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>