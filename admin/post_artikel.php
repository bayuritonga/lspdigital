<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include '../koneksi.php';

// Mendapatkan data dari form
$judul = $conn->real_escape_string($_POST['judul']);
$konten = $conn->real_escape_string($_POST['konten']);
$tanggal = date('Y-m-d');

// Memproses upload gambar
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

// Memeriksa apakah file adalah gambar asli atau bukan
$check = getimagesize($_FILES["gambar"]["tmp_name"]);
if ($check !== false) {
    $uploadOk = 1;
} else {
    echo "File bukan gambar.";
    $uploadOk = 0;
}

// Memeriksa apakah file sudah ada
if (file_exists($target_file)) {
    echo "Maaf, file sudah ada.";
    $uploadOk = 0;
}

// Memeriksa ukuran file
if ($_FILES["gambar"]["size"] > 5000000) { // Batas ukuran 5MB
    echo "Maaf, ukuran file terlalu besar.";
    $uploadOk = 0;
}

// Memeriksa format file
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Maaf, hanya format JPG, JPEG, PNG & GIF yang diperbolehkan.";
    $uploadOk = 0;
}

// Memeriksa apakah $uploadOk bernilai 0 karena kesalahan
if ($uploadOk == 0) {
    echo "Maaf, file Anda tidak terupload.";
} else {
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        // Menyimpan artikel ke database
        $sql = "INSERT INTO artikel (judul, konten, tanggal, gambar) VALUES ('$judul', '$konten', '$tanggal', '$target_file')";
        if ($conn->query($sql) === TRUE) {
            echo "Artikel berhasil diposting. <a href='index.php?page=posting'>Posting Artikel Lagi</a> | <a href='../index.php?page=artikel'>Lihat Artikel</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload file Anda.";
    }
}

$conn->close();
?>
