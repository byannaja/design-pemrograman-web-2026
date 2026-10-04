<?php
require_once __DIR__ . '/session.php';

if (!isset($_SESSION['user_id'])) {
    $returnTo = $_SERVER['REQUEST_URI'] ?? '/jobsheet-11/index.php';
    header('Location: /jobsheet-11/auth/login.php?return_to=' . rawurlencode($returnTo));
    exit;
}