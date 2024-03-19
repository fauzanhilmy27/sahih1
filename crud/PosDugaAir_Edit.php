<?php
include "index.html";
include "koneksi.php";
?>
<?php

if(isset($_GET['nama']) && !empty($_GET['nama'])) {
    $nama = $_GET['nama'];

    $sql = "SELECT * FROM pos WHERE nama='$nama' ORDER BY `nama` DESC";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Mengambil baris data sebagai array asosiatif
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "Nama tidak ditemukan.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-6">
<title>Edit Data</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* CSS untuk mengatur lebar input */
    .short-input {
        width: 300px; /* Atur lebar input sesuai kebutuhan */
    }
    .solid-box {
        border: 1px solid #ddd; /* Atur border */
        overflow-y: auto; /* Atur overflow ke auto untuk scroll vertikal */
        max-height: 450px; /* Atur tinggi maksimal kotak */
    }
    
</style>
</head>
<body>
    <br></br>
    <br></br>
<div class="container mt-4">
    <div class="col-lg-12">
    <div class="solid-box">
      <div class="card">
        <div class="card-body">
    <div class="container mt-5">
        <h2 class="mb-4">Edit Data</h2>
        <form action="PosDugaAir_Proses_Edit.php" method="POST" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-lg-6">
                <div class="mb-3">
                        <label for="id" class="form-label">ID:</label>
                        <input type="text" class="form-control short-input" id="id" name="id" value="<?php echo $row["id"]; ?>" readonly required></input>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control short-input" id="nama" name="nama" value="<?php echo $row["nama"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="device_id" class="form-label">Device ID:</label>
                        <input type="text" class="form-control short-input" id="device_id" name="device_id" value="<?php echo $row["device_id"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="cctv" class="form-label">CCTV:</label>
                        <input type="text" class="form-control short-input" id="cctv" name="cctv" value="<?php echo $row["cctv"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="mercu" class="form-label">Mercu:</label>
                        <input type="text" class="form-control short-input" id="mercu" name="mercu" value="<?php echo $row['mercu']; ?>" required>
                    <div class="mb-3">
                        <label for="NoRegisterPos" class="form-label">NoRegisterPos:</label>
                        <input type="text" class="form-control short-input" id="NoRegisterPos" name="NoRegisterPos" value="<?php echo $row["NoRegisterPos"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="TipePos" class="form-label">TipePos:</label>
                        <input type="text" class="form-control short-input" id="TipePos" name="TipePos" require value="<?php echo $row["TipePos"]; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="TanggalPemasangan" class="form-label">Tanggal Pemasangan:</label>
                        <input type="date" class="form-control short-input" id="TanggalPemasangan" name="TanggalPemasangan" require value="<?php echo $row["TanggalPemasangan"]; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="WilayahSungai" class="form-label">Wilayah Sungai:</label>
                        <input type="text" class="form-control short-input" id="WilayahSungai" name="WilayahSungai" value="<?php echo $row["WilayahSungai"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="Elevasi" class="form-label">Elevasi:</label>
                        <input type="text" class="form-control short-input" id="Elevasi" name="Elevasi" value="<?php echo $row["Elevasi"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="DaerahAliranSungai" class="form-label">Daerah Aliran Sungai:</label>
                        <input type="text" class="form-control short-input" id="DaerahAliranSungai" name="DaerahAliranSungai" value="<?php echo $row["DaerahAliranSungai"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="SubDaerahAliranSungai" class="form-label">SubDaerah Aliran Sungai:</label>
                        <input type="text" class="form-control short-input" id="SubDaerahAliranSungai" name="SubDaerahAliranSungai" value="<?php echo $row["SubDaerahAliranSungai"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="DibangunOleh" class="form-label">Dibangun Oleh:</label>
                        <input type="text" class="form-control short-input" id="DibangunOleh" name="DibangunOleh" value="<?php echo $row["DibangunOleh"]; ?>" require></input>
                    </div>
                   
                </div>
                <div class="col-lg-6">
                <div class="mb-3">
                        <label for="DibangunTahun" class="form-label">Dibagun Tahun:</label>
                        <input type="number" class="form-control short-input" id="DibangunTahun" name="DibangunTahun" value="<?php echo $row["DibangunTahun"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="DirenovasiOleh" class="form-label">Direnovasi Oleh:</label>
                        <input type="text" class="form-control short-input" id="DirenovasiOleh" name="DirenovasiOleh" value="<?php echo $row["DirenovasiOleh"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="DirenovasiTahun" class="form-label">Direnovasi Tahun:</label>
                        <input type="number" class="form-control short-input" id="DirenovasiTahun" name="DirenovasiTahun" value="<?php echo $row["DirenovasiTahun"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="Keterangan" class="form-label">Keterangan:</label>
                        <input type="text" class="form-control short-input" id="Keterangan" name="Keterangan" value="<?php echo $row["Keterangan"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="lat" class="form-label">Lat:</label>
                        <input type="text" class="form-control short-input" id="lat" name="lat" value="<?php echo $row["lat"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="lon" class="form-label">lon:</label>
                        <input class="form-control short-input" id="lon" name="lon" require value="<?php echo $row["lon"]; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="Provinsi" class="form-label">Provinsi:</label>
                        <!-- <input type="hidden" id="Provinsi" name="Provinsi" require> -->
                        <select class="form-select short-input"id="Provinsi" name="Provinsi" value="<?php echo $row["Provinsi"]; ?>" require>
                        <option value="">Pilih Provinsi</option>
                        </select></input>
                    </div>
                    <div class="mb-3">
                        <label for="Kabupaten_Kota" class="form-label">Kabupaten / Kota:</label>
                        <select class="form-select short-input" id="Kabupaten_Kota" name="Kabupaten_Kota" value="<?php echo $row["Kabupaten_Kota"]; ?>" require>
                        <option value="">Pilih Kabupaten/Kota</option>    
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="Kecamatan" class="form-label">Kecamatan:</label>
                        <select class="form-select short-input" id="Kecamatan" name="Kecamatan" value="<?php echo $row["Kecamatan"]; ?>" require>
                        <option value="">Pilih Kecamatan</option>    
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="Kelurahan_Desa" class="form-label">Kelurahan / Desa:</label>
                        <select class="form-select short-input" id="Kelurahan_Desa" name="Kelurahan_Desa" value="<?php echo $row["Kelurahan_Desa"]; ?>" require>
                        <option value="">Pilih Kelurahan/Desa</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="lebar" class="form-label">Lebar:</label>
                        <input type="text" class="form-control short-input" id="lebar" name="lebar" value="<?php echo $row["lebar"]; ?>" require></input>
                    </div>
                    <div class="mb-3">
                        <label for="coef" class="form-label">Coef:</label>
                        <input type="text" class="form-control short-input" id="coef" name="coef" value="<?php echo $row["coef"]; ?>" require></input>
                    </div>
                    <!-- Tambahkan input lainnya di sini -->
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
<script>
    function validateForm() {
    return confirm("Apakah Anda yakin ingin mengedit formulir?");
    }
</script>

    </body>
    </html>