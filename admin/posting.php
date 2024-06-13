<?php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

    <div class="admin-container">
        <h2>Posting Artikel Baru</h2>
        <form action="post_artikel.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="konten">Konten:</label>
                <textarea id="konten" name="konten" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" required>
            </div>
            <button type="submit">Posting</button>
        </form>
    </div>

