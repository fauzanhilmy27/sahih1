<?php
include 'koneksi.php';

// Ambil data yang dikirimkan melalui formulir
$nama = $_POST['nama'];
$device_id = $_POST['device_id'];
$cctv = $_POST['cctv'];
$mercu = $_POST['mercu'];
$NoRegisterPos = $_POST['NoRegisterPos'];
$TipePos = $_POST['TipePos'];
$TanggalPemasangan = $_POST['TanggalPemasangan'];
$WilayahSungai = $_POST['WilayahSungai'];
$Elevasi = $_POST['Elevasi'];
$DaerahAliranSungai = $_POST['DaerahAliranSungai'];
$SubDaerahAliranSungai = $_POST['SubDaerahAliranSungai'];
$DibangunOleh = $_POST['DibangunOleh'];
$DibangunTahun = $_POST['DibangunTahun'];
$DirenovasiOleh = $_POST['DirenovasiOleh'];
$DirenovasiTahun = $_POST['DirenovasiTahun'];
$Keterangan = $_POST['Keterangan'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$Provinsi = ($_POST['Provinsi']);
$Kabupaten_Kota = $_POST['Kabupaten_Kota'];
$Kecamatan = $_POST['Kecamatan'];
$Kelurahan_Desa = $_POST['Kelurahan_Desa'];
$lebar = $_POST['lebar'];
$coef = $_POST['coef'];

// Query untuk menyimpan data ke dalam database
$sql = "INSERT INTO pos (nama, device_id, cctv, mercu, NoRegisterPos, TipePos, TanggalPemasangan, WilayahSungai, Elevasi, DaerahAliranSungai, SubDaerahAliranSungai, DibangunOleh, DibangunTahun, DirenovasiOleh, DirenovasiTahun, Keterangan, lat, lon, Provinsi, Kabupaten_Kota, Kecamatan, Kelurahan_Desa, lebar, coef) 
VALUES ('$nama', '$device_id', '$cctv', '$mercu', '$NoRegisterPos', '$TipePos', '$TanggalPemasangan', '$WilayahSungai', '$Elevasi', '$DaerahAliranSungai', '$SubDaerahAliranSungai', '$DibangunOleh', '$DibangunTahun', '$DirenovasiOleh', '$DirenovasiTahun', '$Keterangan', '$lat', '$lon', '$Provinsi', '$Kabupaten_Kota', '$Kecamatan', '$Kelurahan_Desa', '$lebar', '$coef')";

// Jalankan query
if(mysqli_query($koneksi, $sql)) {
    // Set pesan notifikasi ke dalam variabel session
    session_start();
    $_SESSION['notif'] = 'Data berhasil dimasukkan ke dalam database';

    // Redirect kembali ke halaman posdugaair.php
    header("Location: PosDugaAir.php?success=true");
    exit(); // Pastikan tidak ada output lain sebelum header() dipanggil
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi database
mysqli_close($koneksi);
?>