<?php
session_start(); // Memulai sesi

// Menghapus semua variabel sesi
$_SESSION = array();

// Menghancurkan sesi
session_destroy();

// Mengarahkan kembali ke halaman login
header("Location: login.php");
exit;
?>