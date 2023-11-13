<?php include 'view/head.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">

        <div class="col-md-5">

            <!-- Judul halaman login -->
            <h2 class="text-center mb-4 mt-5">Login</h2>

            <!-- Menampilkan pesan kesalahan atau keberhasilan jika ada -->
            <?php
            // Jika terdapat parameter GET 'error', tampilkan pesan kesalahan dalam kotak peringatan berwarna merah
            if (isset($_GET['error'])) echo '<div class="alert alert-danger" role="alert">', $_GET['error'], '</div>';
            // Jika terdapat parameter GET 'success', tampilkan pesan keberhasilan dalam kotak peringatan berwarna hijau
            if (isset($_GET['success'])) echo '<div class="alert alert-success" role="alert">', $_GET['success'], '</div>';
            ?>

            <!-- Formulir untuk login dengan metode POST yang mengarah ke 'login_function.php' -->
            <form method="post" action="login_function.php">

                <!-- Input untuk username -->
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <!-- Input untuk password -->
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <!-- Tombol untuk melakukan login -->
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

            <!-- Tautan untuk mendaftar jika belum memiliki akun -->
            <p class="text-center mt-3">Belum punya akun? <a href="register.php">Daftar disini</a></p>
        </div>
    </div>
</div>

<?php include 'view/footer.php'; ?>
