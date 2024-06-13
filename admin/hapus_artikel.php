<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Mendapatkan informasi artikel termasuk jalur file gambar
    $sql = "SELECT gambar FROM artikel WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $gambar = $row['gambar'];

        // Menghapus artikel dari database
        $sql = "DELETE FROM artikel WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            // Menghapus gambar dari direktori uploads
            if (file_exists($gambar)) {
                unlink($gambar);
            }

            // Berhasil dihapus, redirect kembali ke admin_artikel.php
            header("Location: index.php?page=daftar_artikel");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Artikel tidak ditemukan.";
    }
} else {
    // Jika tidak ada ID yang diberikan, redirect kembali ke admin_artikel.php
    header("Location: index.php?page=daftar_artikel");
    exit();
}

$conn->close();
?>
