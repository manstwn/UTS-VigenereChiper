<?php
// Kunci untuk Vigenere Cipher
$key = "NOTE";

// Pengaturan Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uts_chiper";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    // Jika koneksi gagal, tampilkan pesan kesalahan menggunakan JavaScript
    $pesan_kesalahan = "Error: Tidak dapat terhubung ke database. Silakan coba lagi nanti.";
    echo "<script>alert('$pesan_kesalahan');</script>";
    // Hentikan eksekusi lebih lanjut
    die("Koneksi gagal: " . $conn->connect_error);
}
?>