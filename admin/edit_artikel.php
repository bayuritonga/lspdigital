<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include '../koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM artikel WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "Artikel tidak ditemukan.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $conn->real_escape_string($_POST['judul']);
    $konten = $conn->real_escape_string($_POST['konten']);
    $tanggal = date('Y-m-d');

    $sql = "UPDATE artikel SET judul='$judul', konten='$konten', tanggal='$tanggal' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?page=daftar_artikel");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <h2>Admin Portal</h2>
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="index.php?page=daftar_artikel">Daftar Artikel</a></li>
                <li><a href="index.php?page=posting">Posting Artikel Baru</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="header">
                <h2>Daftar Artikel</h2>
                <a href="logout.php">Logout</a>
            </div>
            <div class="admin-container">
                <h2>Edit Artikel</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" id="judul" name="judul" value="<?php echo $row['judul']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten:</label>
                        <textarea id="konten" name="konten" rows="10" required><?php echo $row['konten']; ?></textarea>
                    </div>
                    <button type="submit">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>



<?php

$conn->close();
?>