<?php
include 'koneksi.php';

$id = intval($_GET['id']);
$sql = "SELECT * FROM artikel WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    echo "Artikel tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['judul']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">

        <header>
            <div class="header-container">
                <div class="logo">
                    <img src="images/header.png" alt="RBC">
                </div>
            </div>
        </header>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a a href="index.php?page=profil" class="dropbtn">Profil</a>
                    <div class="dropdown-content">
                        <a href="index.php?page=visimisi">Visi dan Misi</a>
                    </div>
                </li>
                <li li class="dropdown">
                    <a href="#" class="dropbtn">Blog</a>
                    <div class="dropdown-content">
                        <a href="index.php?page=artikel">Artikel</a>
                        <a href="index.php?page=event">Event</a>
                        <a href="index.php?page=galeri">Galeri Foto</a>
                    </div>
                </li>
                <li><a href="index.php?page=kontak">Kontak</a></li>
                <li><a href="index.php?page=about">About Us</a></li>
                <li style="float:right"><a href="admin/login.php">Login</a></li>
            </ul>
        </nav>
        <main>
            <div class="article-container">
                <h2><?php echo $row['judul']; ?></h2>
                <?php
                if (!empty($row['gambar'])) {
                    echo "<img src='admin/" . $row['gambar'] . "' alt='Artikel Gambar'>";
                }
                echo "<p>" . $row['konten'] . "</p>";
                ?>
            </div>
        </main>
        <footer>


            © 2024 Copyright: Bayu Surbana Ritonga - JWD Juni 2024 UIN Sumatera Utara


        </footer>
</body>

</html>

<?php
$conn->close();
?>