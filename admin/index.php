<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
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
                <h2>Dashboard</h2>
                <a href="logout.php">Logout</a>
            </div>

            <main>
                <?php

                if (isset($_GET['page'])) {
                    require $_GET['page'] . ".php";
                } else {
                    require "dashboard.php";
                }

                ?>
            </main>


        </div>
    </div>
</body>

</html>