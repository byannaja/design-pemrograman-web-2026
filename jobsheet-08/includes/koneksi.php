<?php
$host = 'aws-0-ap-south-1.pooler.supabase.com';
$port = '5432';
$dbname = 'postgres';
$user = 'postgres.hsofpzsahyrldkoepzvx';
$password = '1976Ad67@~as';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>