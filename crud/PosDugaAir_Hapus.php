<?php
include 'koneksi.php';
?>
<?php
// Pastikan parameter id ada dan tidak kosong
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Ambil nilai parameter id dari URL
    $id = $_GET['id'];

    // Query SQL untuk menghapus data dari database
    $sql = "DELETE FROM pos WHERE id='$id'";

    // Jalankan query
    if(mysqli_query($koneksi, $sql)) {
        // Set pesan notifikasi ke dalam variabel session
        session_start();
        $_SESSION['notif'] = 'Data berhasil dihapus dari database';

        // Redirect kembali ke halaman posdugaair.php setelah berhasil menghapus
        header("Location: PosDugaAir.php?success=true");
        exit(); // Pastikan tidak ada output lain sebelum header() dipanggil
    } else {
        // Tampilkan pesan error jika query gagal dijalankan
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
} else {
    // Tampilkan pesan jika parameter id tidak ditemukan atau kosong
    echo "ID tidak ditemukan.";
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
<script>
    function validateForm() {
    return confirm("Apakah Anda yakin ingin mengedit formulir?");
    }
</script>
</body>
</html>