<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Ritonga Bikers Community</title>
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
                    <a   a href="index.php?page=profil" class="dropbtn">Profil</a>
                    <div class="dropdown-content">
                        <a href="index.php?page=visimisi">Visi dan Misi</a>
                    </div>
                </li>
                <li   li class="dropdown">
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

            <?php

                if(isset($_GET['page'])){
                    require $_GET['page'] . ".php";
                } else {
                    require "profil.php";
                }

            ?>

        </main>

        <footer>

            
                © 2024 Copyright: Bayu Surbana Ritonga - JWD Juni 2024 UIN Sumatera Utara
            

        </footer>

    </div>


</body>
</html>