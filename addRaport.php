<?php
session_start();
include './controller/conn.php';
$kelas = $_SESSION['kelas'];
$idSiswa = $_GET['id_siswa'];
$namaKelas = $_GET['nama_kelas'];
$namaSiswa = $_GET['nama_siswa'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title><?php include './include/titleweb.php' ?> | Input Nilai Siswa</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Style css -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include './include/navHeader.php' ?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->

        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php require("./include/Header.php") ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php require("./include/Sidebar.php") ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Input Data Nilai siswa</a></li>
                    </ol>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <?php
                                // mengambil data siswa berdasarkan id
                                $query = mysqli_query($conn, "SELECT * FROM user WHERE id='$idSiswa'");
                                $dataSiswa = mysqli_fetch_array($query);
                                ?>
                                <h4 class="card-title">Nama Siswa : <?php echo $dataSiswa['nama'] ?></h4>
                                <h4 class="">Kelas : <?php echo $kelas;?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" method="POST" action="./controller/raport/add.php">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Keterangan Raport</label>
                                                    <input type="text" name="keterangan_raport" class="form-control" style="border-radius: 0;" placeholder="Keterangan Raport Semester" required>
                                                     <!-- nama siswa -->
                                                     <input hidden  type="text" name="nama_siswa_untuk_raport" class="form-control" style="border-radius: 0;" placeholder="nama siswa" readonly required value="<?php echo $dataSiswa['nama'] ?>">
                                                </div>
                                            </div>
                                            <?php
                                            $ambilDataPelajaran = mysqli_query($conn, "SELECT * FROM mapel WHERE mapel != 'upacara'");
                                            while ($dataPelajaran = mysqli_fetch_array($ambilDataPelajaran)) {
                                            ?>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label"> Mata Pelajaran</label>
                                                        <!-- id siswa -->
                                                        <input hidden req  type="text" name="idSiswa" class="form-control" style="border-radius: 0;" placeholder="nama siswa" readonly required value=" <?php echo $dataSiswa['id'] ?>" >
                                                       
                                                        <!-- kelas siswa -->
                                                        <input hidden  type="text" name="kelas" class="form-control" style="border-radius: 0;" placeholder="nama siswa" readonly required value="<?php echo $dataSiswa['kelas'] ?>">
                                                        <!-- wali kelas -->
                                                        <input hidden type="text" name="wali_kelas" class="form-control" style="border-radius: 0;" placeholder="nama siswa" readonly required value="<?php echo $_SESSION['nama'] ?>">
                                                        <input hidden type="text" name="mapel_id[]" class="form-control" style="border-radius: 0;" placeholder="nama siswa" readonly required value="<?php echo $dataPelajaran['id'] ?>">
                                                        <input type="text" name="nama_siswa" class="form-control " style="border-radius: 0; background:#F5F5F5; font-weight: 700;" placeholder="nama siswa" readonly required value="<?php echo strtoupper($dataPelajaran['mapel']) ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Nilai</label>
                                                        <input type="number" name="nilai[]" class="form-control" style="border-radius: 0;" placeholder="Nilai Pelajaran" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Deskrpisi Nilai</label>
                                                        <input type="text"  name="deskripsi_nilai[]" class="form-control" style="border-radius: 0;" placeholder="Deskripsi Nilai Pelajaran" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Nilai Keterampilan</label>
                                                        <input type="number"  name="nilai_keterampilan[]" class="form-control" style="border-radius: 0;" placeholder="Nilai Keterampilan" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Deskrpisi Keterampilan</label>
                                                        <input type="text"  name="deskripsi_keterampilan[]" class="form-control" style="border-radius: 0;" placeholder="Deskripsi Nilai Keterampilan" >
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <hr>
                                            <div class="mb-2">
                                                <span class="fw-bold">Ketidak Hadiran *</span>
                                                <?php
                                                $getdataAbsensi = mysqli_query($conn, "SELECT 
                                                nama_siswa,
                                                idKelas,
                                                SUM(IF(hadir = 'hadir', 1, 0)) AS jumlah_hadir,
                                                SUM(IF(izin = 'izin', 1, 0)) AS jumlah_izin,
                                                SUM(IF(sakit = 'sakit', 1, 0)) AS jumlah_sakit,
                                                SUM(IF(alpa = 'alpa', 1, 0)) AS jumlah_alpa
                                            FROM absensi
                                            WHERE nama_siswa = '$namaSiswa' AND idKelas = '$namaKelas'
                                            GROUP BY nama_siswa, idKelas;");
                                            $dataAbsensiSiswa = mysqli_fetch_array($getdataAbsensi);
                                                ?>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">izin</label>
                                                    <input type="number" name="izin" class="form-control" style="border-radius: 0;" placeholder="jumlah izin"  value="<?php echo $dataAbsensiSiswa['jumlah_izin']  ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Sakit</label>
                                                    <input type="number" name="sakit" class="form-control" style="border-radius: 0;" placeholder="jumlah sakit"  value="<?php echo $dataAbsensiSiswa['jumlah_sakit']  ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Tanpa Keterangan</label>
                                                    <input type="number" name="alpha" class="form-control" style="border-radius: 0;" placeholder="jumlah alpha"  value="<?php echo $dataAbsensiSiswa['jumlah_alpa'] ?>" required>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="mb-2">
                                                <span class="fw-bold">Sikap *</span>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label"></label>
                                                    <input type="text" name="sikap_spritual" class="form-control" style="border-radius: 0; background:#F5F5F5;" readonly placeholder="Sikap Spritual" >
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Keterangan Sikap Spritual</label>
                                                    <input type="text" name="keterangan_sikap_spritual" class="form-control" style="border-radius: 0;" placeholder="Keterangan Sikap Spritual"  >
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label"></label>
                                                    <input type="text" name="sikap_sosial" class="form-control" style="border-radius: 0; background:#F5F5F5;" placeholder="Sikap Sosial" readonly >
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Keterangan Sikap Sosial</label>
                                                    <input type="text" name="keterangan_sikap_sosial" class="form-control" style="border-radius: 0;" placeholder="Keterangan Sikap Sosial"  >
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="mb-2">
                                                <span class="fw-bold">TINGGI DAN BERAT BADAN *</span>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="mb-3">
                                                    <label class="text-label form-label">Tinggi Badan</label>
                                                    <input type="text" name="tinggi_badan" class="form-control" style="border-radius: 0; background:#F5F5F5;" readonly placeholder="Tinggi Badan" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="mb-3">
                                                    <label class="text-label form-label">Tingi Badan Semester Satu</label>
                                                    <input type="text" name="tinggi_badan_semester_satu" class="form-control" style="border-radius: 0;" placeholder="Tingi Badan Semester Satu" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="mb-3">
                                                    <label class="text-label form-label">Tingi Badan Semester Dua</label>
                                                    <input type="text" name="tinggi_badan_semester_dua" class="form-control" style="border-radius: 0;" placeholder="Tingi Badan Semester Dua" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="mb-3">
                                                    <label class="text-label form-label">Berat Badan</label>
                                                    <input type="text" name="berat_badan" class="form-control" style="border-radius: 0; background:#F5F5F5;" readonly placeholder="Berat Badan" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="mb-3">
                                                    <label class="text-label form-label">Berat Badan Semester Satu</label>
                                                    <input type="text" name="berat_badan_semester_satu" class="form-control" style="border-radius: 0;" placeholder="Berat Badan Semester Satu" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="mb-3">
                                                    <label class="text-label form-label">Berat Badan Semester Dua</label>
                                                    <input type="text" name="berat_badan_semester_dua" class="form-control" style="border-radius: 0;" placeholder="Berat Badan Semester Dua" >
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="mb-2">
                                                <span class="fw-bold">Kesehatan *</span>
                                            </div>
                                            <?php
                                            $getKesehatan = mysqli_query($conn, "SELECT * FROM kesehatan");
                                            while ($dataKEsehatan = mysqli_fetch_array($getKesehatan)) {
                                                
                                            ?>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Jenis Kesehatan</label>
                                                    <input hidden type="text" name="kesehatan_id[]" class="form-control" style="border-radius: 0; background:#F5F5F5;" placeholder="saran" value="<?php echo $dataKEsehatan['id']?>" readonly required>
                                                    <input type="text" name="jenis_kesehatan[]" class="form-control" style="border-radius: 0; background:#F5F5F5;" placeholder="saran" value="<?php echo $dataKEsehatan['jenis_kesehatan']?>" readonly required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Keterangan</label>
                                                    <input type="text" name="keterangan_kesehatan[]" class="form-control" style="border-radius: 0;" placeholder="Keterangan Kesehatan" >
                                                </div>
                                            </div>
                                            <?php }?>
                                            <hr>
                                            <div class="mb-2">
                                                <span class="fw-bold">Saran *</span>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Saran</label>
                                                    <input type="text" name="saran" class="form-control" style="border-radius: 0;" placeholder="saran" >
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <span class="fw-bold">Status Raport *</span>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <label class="radio-inline me-3"><input required type="radio" name="status_raport" value="belum selesai">Belum Selesai</label>
                                                    <label class="radio-inline me-3" ><input required type="radio" name="status_raport" value="selesai">Selesai</label>
                                            </div>
                                        </div>
                                        <a href="./dataNilaiSiswa.php" class="btn btn-warning text-white">Kembali</a>
                                        <button class="btn btn-primary " type="submit" style="float: right;">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->




        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © SDN LEUWILIANG 01 by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <!-- Apex Chart -->
    <script src="vendor/apexchart/apexchart.js"></script>

    <script src="vendor/chart.js/Chart.bundle.min.js"></script>

    <!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>
    <!-- Dashboard 1 -->
    <script src="js/dashboard/dashboard-1.js"></script>

    <script src="vendor/owl-carousel/owl.carousel.js"></script>

    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <?php
    if ($_SESSION['level'] == 'admin') {
        
    ?>
    <script src="js/styleSwitcher.js"></script>
    <?php }?>


</body>

</html>