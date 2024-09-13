<?php
// Ubah ke nilai yang sesuai dengan pengaturan MySQL Anda
$servername = "localhost"; // Bisa juga coba dengan '127.0.0.1'
$username = "root";
$password = ""; // Sesuaikan dengan password Anda
$database = "db_shortener";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
