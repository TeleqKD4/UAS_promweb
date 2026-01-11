<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit;
}

require_once __DIR__ . '/koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM products WHERE id='$id'");

header("Location: dashboard.php");
exit;
