<?php
// Konfigurasi koneksi ke database
$host     = "localhost";
$username = "root";
$password = ""; // kosong jika default XAMPP
$database = "db_mahasiswa";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    echo "Koneksi berhasil ke database db_mahasiswa";
}
?>
