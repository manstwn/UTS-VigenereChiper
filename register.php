<?php include 'view/head.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-5">
            <!-- Judul halaman registrasi -->
            <h2 class="text-center mb-4 mt-5">Register</h2>

            <!-- Menampilkan pesan kesalahan atau keberhasilan jika ada -->
            <?php
            // Jika terdapat parameter GET 'error', tampilkan pesan kesalahan dalam kotak peringatan berwarna merah
            if (isset($_GET['error'])) echo '<div class="alert alert-danger" role="alert">', $_GET['error'], '</div>';
            // Jika terdapat parameter GET 'success', tampilkan pesan keberhasilan dalam kotak peringatan berwarna hijau
            if (isset($_GET['success'])) echo '<div class="alert alert-success" role="alert">', $_GET['success'], '</div>';
            ?>

            <!-- Formulir registrasi dengan input untuk username dan password -->
            <form id="registerForm" method="post" action="register_function.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required minlength="6" maxlength="32">
                    <small id="usernameHelp" class="form-text text-muted">Username must be between 6 and 32 characters.</small>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="6" maxlength="32">
                    <small id="passwordHelp" class="form-text text-muted">Password must be between 6 and 32 characters.</small>
                </div>

                <!-- Tombol untuk memvalidasi formulir dan menampilkan modal konfirmasi -->
                <button type="button" class="btn btn-success btn-block" onclick="validateAndShowModal()">Register</button>
            </form>

            <!-- Tautan untuk login jika pengguna sudah memiliki akun -->
            <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login disini</a></p>
        </div>
    </div>

    <!-- Modal konfirmasi -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to register?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="submitForm()">Register</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Skrip JavaScript untuk validasi formulir dan mengirimkan formulir -->
    <script>
        // Fungsi untuk memvalidasi formulir dan menampilkan modal konfirmasi jika valid
        function validateAndShowModal() {
            if ($('#registerForm')[0].checkValidity()) {
                $('#confirmationModal').modal('show');
            } else {
                // Jika formulir tidak valid, lakukan validasi formulir bawaan
                $('#registerForm')[0].reportValidity();
            }
        }

        // Fungsi untuk mengirimkan formulir setelah dikonfirmasi
        function submitForm() {
            $('#registerForm').submit();
        }
    </script>

</div>
<?php include 'view/footer.php'; ?>