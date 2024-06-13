<?php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include '../koneksi.php';

// Mendapatkan artikel dari database
$sql = "SELECT * FROM artikel ORDER BY tanggal DESC";
$result = $conn->query($sql);
?>

    <div class="admin-container">
        <h2>Daftar Artikel</h2>
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['judul'] . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "<td>";
                        echo "<a href='edit_artikel.php?id=" . $row['id'] . "'>Ubah</a> | ";
                        echo "<a href='hapus_artikel.php?id=" . $row['id'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus artikel ini?')\">Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada artikel yang ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
$conn->close();
?>
