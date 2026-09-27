<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    // Sesuaikan path menuju halaman login tergantung letak folder proyekmu
    header("Location: /jobsheet-10/auth/login.php");
    exit;
}