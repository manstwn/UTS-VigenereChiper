<?php

// Menghubungkan ke file config.php yang berisi koneksi database

include 'config.php';

// Memeriksa apakah permintaan (request) yang diterima adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai username dan password dari formulir POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Melakukan enkripsi password menggunakan fungsi encryptVigenere dengan kunci (key)
    $encrypted_password = encryptVigenere($password, $key);

    // Pengaksesan variabel global $conn yang merupakan objek koneksi database

    // Memeriksa apakah username sudah ada dalam database
    $check_username_sql = "SELECT * FROM akun WHERE username = '$username'";
    $result = $conn->query($check_username_sql);

    if ($result->num_rows > 0) {
        // Jika username sudah ada, tampilkan pesan kesalahan
        $error = "Username sudah digunakan, pilih username lain.";
        header("Location: register.php?error=" . urlencode($error));
        exit;
    }

    // Jika username belum ada, lanjutkan dengan penyisipan data ke database
    $insert_sql = "INSERT INTO akun (username, password) VALUES ('$username', '$encrypted_password')";

    if ($conn->query($insert_sql) === TRUE) {
        // Jika penyisipan berhasil, arahkan pengguna ke halaman login dengan pesan sukses
        $success = "Registrasi Berhasil, Silakan login";
        header("Location: login.php?success=" . urlencode($success));
        exit;
    } else {
        // Jika terjadi kesalahan dalam kueri database, tampilkan pesan kesalahan
        echo '<script>alert("Koneksi ke Database Error");</script>';
    }
}

// Fungsi untuk mengenkripsi password menggunakan metode Vigenere
function encryptVigenere($password, $key) {
    $encrypted_password = "";
    $key_length = strlen($key);

    for ($i = 0; $i < strlen($password); $i++) {
        $char = $password[$i];
        if (ctype_alpha($char)) {  // Abaikan karakter non-alfabet
            $key_char = $key[$i % $key_length];
            $shift = ord(strtolower($key_char)) - ord('a');  // Hitung pergeseran berdasarkan karakter kunci
            $encrypted_char = chr((ord(strtolower($char)) - ord('a') + $shift) % 26 + ord('a'));

            // Pertahankan casing asli (uppercase/lowercase)
            if (ctype_upper($char)) {
                $encrypted_char = strtoupper($encrypted_char);
            }

            $encrypted_password .= $encrypted_char;
        } else {
            $encrypted_password .= $char;
        }
    }

    return $encrypted_password;
}
?>
