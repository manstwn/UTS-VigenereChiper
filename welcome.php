<?php include 'view/head.php'; ?>

<?php
session_start();
// Mulai sesi PHP, diperlukan untuk menggunakan variabel sesi

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika tidak ada informasi tentang pengguna di sesi, redirect ke halaman login
    header("Location: login.php");
    exit;
}
?>


<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-5">
            <!-- Judul untuk menandakan login berhasil -->
            <h2 class="text-center mb-4 mt-5">Login Berhasil !!! </h2>
            
            <!-- Menampilkan nama pengguna saat ini -->
            <h2 class="text-center">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
            
            <!-- Tombol logout -->
            <a href="logout_function.php" class="btn btn-danger btn-block mb-4 mt-5">Logout</a>
        </div>
    </div>
</div>

<?php include 'view/footer.php'; ?>
