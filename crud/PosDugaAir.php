<!DOCTYPE html>
<?php
include "index.html";
include "koneksi.php";
?>


<script
src="https://code.jquery.com/jquery-3.7.1.js"
integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="cssfile/style.css"> -->
    <style>
    /* CSS untuk mengatur lebar input */
    .short-input {
        width: 300px; /* Atur lebar input sesuai kebutuhan */
    }
    .solid-box {
      position: inherit;
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h2">Data DugaPosAir</h2>
                        <!-- Tombol Tambah -->
                        <a href="PosDugaAir_Tambah.php" class="btn btn-primary">Tambah Data</a>
                        <div class="table-responsive">
                            <div class="table-box">
                              <!-- Tabel yang muncul -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Device ID</th>
                                            <th>cctv</th>
                                            <th>mercu</th>
                                            <th>NoRegisterPos</th>
                                            <th>TipePos</th>
                                            <th>TanggalPemasangan</th>
                                            <th>WilayahSungai</th>
                                            <th>Elevasi</th>
                                            <th>DaerahAliranSungai</th>
                                            <th>SubDaerahAliranSungai</th>
                                            <th>DibagunOleh</th>
                                            <th>DibagunTahun</th>
                                            <th>DirenovasiOleh</th>
                                            <th>DirenovasiTahun</th>
                                            <th>Keterangan</th>
                                            <th>Lat</th>
                                            <th>Lon</th>
                                            <th>Provinsi</th>
                                            <th>Kabupaten/Kota</th>
                                            <th>Kecamatan</th>
                                            <th>Kelurahan/Desa</th>
                                            <th>Lebar</th>
                                            <th>Coef</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM pos";
                                        $result = $koneksi->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Tampilkan data
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr><td>" . $row["nama"] . "</td><td>"
                                                    . $row["device_id"] . "</td><td>"
                                                    . $row["cctv"] . "</td><td>"
                                                    . $row["mercu"] . "</td><td>"
                                                    . $row["NoRegisterPos"] . "</td><td>"
                                                    . $row["TipePos"] . "</td><td>"
                                                    . $row["TanggalPemasangan"] . "</td><td>"
                                                    . $row["WilayahSungai"] . "</td><td>"
                                                    . $row["Elevasi"] . "</td><td>"
                                                    . $row["DaerahAliranSungai"] . "</td><td>"
                                                    . $row["SubDaerahAliranSungai"] . "</td><td>"
                                                    . $row["DibangunOleh"] . "</td><td>"
                                                    . $row["DibangunTahun"] . "</td><td>"
                                                    . $row["DirenovasiOleh"] . "</td><td>"
                                                    . $row["DirenovasiTahun"] . "</td><td>"
                                                    . $row["Keterangan"] . "</td><td>"
                                                    . $row["lat"] . "</td><td>"
                                                    . $row["lon"] . "</td><td>"
                                                    . $row["Provinsi"] . "</td><td>"
                                                    . $row["Kabupaten_Kota"] . "</td><td>"
                                                    . $row["Kecamatan"] . "</td><td>"
                                                    . $row["Kelurahan_Desa"] . "</td><td>"
                                                    . $row["lebar"] . "</td><td>"
                                                    . $row["coef"] . "</td>";
                                                 

                                                // Tombol Edit
                                                echo "<td><a href='PosDugaAir_Edit.php?nama=" . $row["nama"] . "' class='btn btn-primary'>Edit</a></td>";
                                                
                                                // Tombol Hapus
                                               echo "<td><a href='PosDugaAir_Hapus.php?id=" .$row["id"] ."'class='btn btn-danger btn-sm' >Hapus</a></td>";
                                                
                                                echo "</tr>";
                                              }
                                            } else {
                                                echo "<tr><td colspan='25'>0 hasil</td></tr>";
                                            }
                                            $koneksi->close();
                                            ?>
                                                </tbody>
                                  </table>
                            </div>
                        </div>
                     </div>
                </div>
           </div>
       </div>
    </div>
                                          


    </form>

</body>
</html>
