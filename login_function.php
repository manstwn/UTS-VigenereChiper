<?php
// Mengimpor file konfigurasi (config.php) yang berisi pengaturan koneksi ke database dan variabel kunci (key)
include 'config.php';

// Memeriksa apakah permintaan (request) yang diterima adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai username dan password dari formulir POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menyiapkan kueri SQL untuk mencari pengguna berdasarkan username
    $sql = "SELECT * FROM akun WHERE username=?";

    // Mempersiapkan pernyataan SQL
    $stmt = $conn->prepare($sql);

    // Mengikat parameter (username) ke pernyataan SQL
    $stmt->bind_param("s", $username);

    // Mengeksekusi pernyataan SQL
    $stmt->execute();

    // Mendapatkan hasil dari eksekusi pernyataan SQL
    $result = $stmt->get_result();

    // Memeriksa apakah ada satu baris hasil (username ditemukan)
    if ($result->num_rows == 1) {
        // Mengambil baris hasil sebagai asosiatif array
        $row = $result->fetch_assoc();

        // Mengambil password terenkripsi dari hasil query
        $encrypted_password = $row['password'];

        // Mendekripsi password menggunakan fungsi decryptVigenere dengan kunci (key)
        $decrypted_password = decryptVigenere($encrypted_password, $key);

        // Memeriksa apakah password yang didekripsi cocok dengan password yang dimasukkan
        if ($decrypted_password == $password) {
            // Memulai sesi
            session_start();

            // Menyimpan username dalam variabel sesi
            $_SESSION['username'] = $username;

            // Mengarahkan pengguna ke halaman welcome setelah login berhasil
            header("Location: welcome.php");
            exit;
        } else {
            // Apabila password tidak cocok
            $error = "Password Salah";
            header("Location: login.php?error=" . urlencode($error));
            exit;
        }
    } else {
        // Apabila pengguna tidak ditemukan
        $error = "Username tidak ditemukan";
        header("Location: login.php?error=" . urlencode($error));
        exit;
    }
}

// Fungsi untuk mendekripsi password menggunakan metode Vigenere
function decryptVigenere($encryptedPassword, $key) {
    $decrypted_password = "";
    $key_length = strlen($key);

    for ($i = 0; $i < strlen($encryptedPassword); $i++) {
        $char = $encryptedPassword[$i];
        if (ctype_alpha($char)) {  // Mengabaikan karakter non-alfabet
            $key_char = $key[$i % $key_length];
            $shift = ord(strtolower($key_char)) - ord('a');  // Hitung pergeseran berdasarkan karakter kunci
            $decrypted_char = chr((ord(strtolower($char)) - ord('a') - $shift + 26) % 26 + ord('a'));

            // Pertahankan casing asli (uppercase/lowercase)
            if (ctype_upper($char)) {
                $decrypted_char = strtoupper($decrypted_char);
            }

            $decrypted_password .= $decrypted_char;
        } else {
            $decrypted_password .= $char;
        }
    }

    return $decrypted_password;
}
?>

