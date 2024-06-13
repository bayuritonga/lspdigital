<?php
session_start();
include '../koneksi.php';

// Mendapatkan data dari form login
$user = $_POST['username'];
$pass = $_POST['password'];

// Mengamankan input user
$user = $conn->real_escape_string($user);
$pass = $conn->real_escape_string($pass);

// Memeriksa username dan password
$sql = "SELECT * FROM user WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Memeriksa password
    if (password_verify($pass, $row['password'])) {
        // Password benar, set session
        $_SESSION['username'] = $user;
        header("Location: index.php");
    } else {
        // Password salah
        echo "Password salah.";
    }
} else {
    // Username tidak ditemukan
    echo "Username tidak ditemukan.";
}

$conn->close();
?>
