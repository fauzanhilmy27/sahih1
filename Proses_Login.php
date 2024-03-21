<?php
// Mulai sesi
session_start();

// Periksa apakah formulir login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Masukkan kredensial basis data Anda di bawah ini
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sahih11";

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ambil nilai dari formulir login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hindari serangan SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Buat query untuk memeriksa kecocokan pengguna dan kata sandi
    $sql = "SELECT * FROM pengguna WHERE nm_pengguna='$username' AND Kt_sandi='$password'";
    $result = $conn->query($sql);

    // Periksa jika hasil kueri menghasilkan satu baris data
    if ($result->num_rows == 1) {
        // Login berhasil, set session dan redirect ke halaman dashboard atau halaman lainnya
        $_SESSION['nm_pengguna'] = $username;
        // Redirect ke halaman dashboard
        header("Location: crud/index.html");
        // Keluar dari skrip
        exit();
    } else {
        // Login gagal, redirect kembali ke halaman login dengan notifikasi
        $error_message = "Username atau password salah. Silakan coba lagi.";
    }

    // Tutup koneksi database
    $conn->close();
}
?>
