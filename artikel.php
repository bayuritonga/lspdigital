<?php
include 'koneksi.php';

// Mendapatkan artikel dari database
$sql = "SELECT * FROM artikel ORDER BY tanggal DESC";
$result = $conn->query($sql);
?>

<div class="article-container">
    <h2>Daftar Artikel</h2>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='article'>";
            if (!empty($row['gambar'])) {
                echo "<img src='admin/" . $row['gambar'] . "' alt='Thumbnail'>";
            }
            echo "<h2>" . $row['judul'] . "</h2>";
            echo "<p>" . substr($row['konten'], 0, 100) . "...</p>";
            echo "<a class='read-more' href='detail_artikel.php?id=" . $row['id'] . "'>Baca Selengkapnya</a>";
            echo "</div>";
        }
    } else {
        echo "<p>Tidak ada artikel yang ditemukan.</p>";
    }
    ?>
</div>

<?php
$conn->close();
?>