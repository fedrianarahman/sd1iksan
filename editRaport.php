<?php
session_start();
include './controller/conn.php';
$kelas = $_SESSION['kelas'];
$idSiswa = $_GET['id_siswa'];
$namaKelas = $_GET['nama_kelas'];
$namaSiswa = $_GET['nama_siswa'];
$waliKelas = $_GET['wali_kelas'];
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
                                <h4 class="">Kelas : <?php echo $kelas; ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" method="POST" action="./controller/raport/update.php">
                                        <?php
                                        $getDataRaport = mysqli_query($conn, "SELECT mapel.mapel AS mapel, raport.mapel AS mapel_id, raport.judul AS judul, raport.nilai_pelajaran AS nilai_pelajaran, raport.deskripsi_nilai_pelajaran AS deskripsi_nilai_pelajaran, raport.nilai_keterampilan AS nilai_keterampilan, raport.deskripsi_nilai_keterampilan AS deskripsi_nilai_keterampilan, raport.status_raport AS status_raport,raport.sikap_spritual AS sikap_spritual,raport.sikap_sosial AS sikap_sosial,raport.saran AS saran,raport.izin AS izin,raport.sakit AS sakit,raport.alfa AS alfa,raport.tbs1 AS tbs1, raport.tbs2 AS tbs2, raport.bbs1 AS bbs1, raport.bbs2 AS bbs2 
                                        FROM raport
                                        INNER JOIN mapel ON mapel.id = raport.mapel
                                        WHERE raport.idSiswa = '$idSiswa' ");

                                        // Inisialisasi array untuk menyimpan data raport
                                        $raportData = array();
                                        

                                        while ($dataRaport = mysqli_fetch_array($getDataRaport)) {
                                            // Simpan data raport dalam array
                                            $raportData[] = $dataRaport;
                                        }

                                        // Periksa jumlah data raport yang ada
                                        $cekJumlah = count($raportData);
                                        // Ambil status raport dari salah satu data raport
                                        $statusRaport = $raportData[0]['status_raport'];
                                        $keteranganRaport = $raportData[0]['judul'];
                                        $sikapSosial = $raportData[0]['sikap_sosial'];
                                        $sikapSpritual = $raportData[0]['sikap_spritual'];
                                        $izin = $raportData[0]['izin'];
                                        $sakit = $raportData[0]['sakit'];
                                        $alfa = $raportData[0]['alfa'];
                                        $tbs1 = $raportData[0]['tbs1'];
                                        $tbs2 = $raportData[0]['tbs2'];
                                        $bbs1 = $raportData[0]['bbs1'];
                                        $bbs2 = $raportData[0]['bbs2'];
                                        $saran =$raportData[0]['saran'];
                                        
                                        ?>
                                            <div class="row">
                                            <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Keterangan Raport</label>
                                                        <input type="text" name="keterangan_raport" class="form-control" style="border-radius: 0;" placeholder="Keterangan Raport Semester" required value="<?php echo $keteranganRaport ?>">
                                                        <!-- nama siswa -->
                                                        <input hidden type="text" name="nama_siswa_untuk_raport" class="form-control" style="border-radius: 0;" placeholder="nama siswa" readonly required value="<?php echo $dataSiswa['nama'] ?>">
                                                        <!-- id siswa -->
                                                        <input hidden type="text" name="id_siswa" class="form-control" style="border-radius: 0;" placeholder="nama siswa" readonly required value="<?php echo $dataSiswa['id'] ?>">
                                                    </div>
                                                </div>
                                        <?php
                                        // Loop untuk menampilkan data
                                        foreach ($raportData as $dataRaport) {
                                        ?>
                                                <hr/>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label"> Mata Pelajaran <?php  ?></label>
                                                        <input type="text" hidden  name="mapel_id[]" value="<?php echo $dataRaport['mapel_id']  ?>">
                                                        <input type="text" name="mata_pelajaran" class="form-control " style="border-radius: 0; background:#F5F5F5; font-weight: 700;" placeholder="nama siswa" readonly required value="<?php echo strtoupper($dataRaport['mapel']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Nilai</label>
                                                        <input type="number" name="nilai_pelajaran[]" class="form-control" style="border-radius: 0;" placeholder="Nilai Pelajaran" value="<?php echo $dataRaport['nilai_pelajaran'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Deskrpisi Nilai</label>
                                                        <input type="text" name="deskripsi_nilai_pelajaran[]" class="form-control" style="border-radius: 0;" placeholder="Deskripsi Nilai Pelajaran" value="<?php echo $dataRaport['deskripsi_nilai_pelajaran'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Nilai Keterampilan</label>
                                                        <input type="number" name="nilai_keterampilan[]" class="form-control" style="border-radius: 0;" placeholder="Nilai Keterampilan" value="<?php echo $dataRaport['nilai_keterampilan'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Deskrpisi Keterampilan</label>
                                                        <input type="text" name="deskripsi_nilai_keterampilan[]" class="form-control" style="border-radius: 0;" placeholder="Deskripsi Nilai Keterampilan" value="<?php echo $dataRaport['deskripsi_nilai_keterampilan'] ?>">
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <hr/>
                                                <!-- en mata pelajaran -->

                                                <!-- ketidak hadiran -->
                                                <div class="mb-2">
                                                <span class="fw-bold">Ketidak Hadiran *</span>
                                                </div>
                                                <div class="col-lg-4 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">izin</label>
                                                    <input type="number" name="izin" class="form-control" style="border-radius: 0;" placeholder="jumlah izin"  value="<?php echo $izin ?>" required>
                                                </div>
                                                </div>
                                                <div class="col-lg-4 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Sakit</label>
                                                        <input type="number" name="sakit" class="form-control" style="border-radius: 0;" placeholder="jumlah sakit"  value="<?php echo $sakit ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Tanpa Keterangan</label>
                                                        <input type="number" name="alpha" class="form-control" style="border-radius: 0;" placeholder="jumlah alpha"  value="<?php echo $alfa ?>" required>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- end ketidak hadiran -->

                                                <!-- sikap sosial -->
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
                                                    <input type="text" name="keterangan_sikap_spritual" class="form-control" style="border-radius: 0;" placeholder="Keterangan Sikap Spritual" value="<?php echo $sikapSpritual ?>" >
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
                                                    <input type="text" name="keterangan_sikap_sosial" class="form-control" style="border-radius: 0;" placeholder="Keterangan Sikap Sosial"  value="<?php echo $sikapSosial ?>">
                                                </div>
                                            </div>
                                            <hr>
                                                <!-- end sikap sosial -->

                                                <!-- tinggi badan dan berat badan -->
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
                                                    <input type="text" name="tinggi_badan_semester_satu" class="form-control" style="border-radius: 0;" placeholder="Tingi Badan Semester Satu" value="<?= $tbs1 ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="mb-3">
                                                    <label class="text-label form-label">Tingi Badan Semester Dua</label>
                                                    <input type="text" name="tinggi_badan_semester_dua" class="form-control" style="border-radius: 0;" placeholder="Tingi Badan Semester Dua" value="<?= $tbs2 ?>">
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
                                                    <input type="text" name="berat_badan_semester_satu" class="form-control" style="border-radius: 0;" placeholder="Berat Badan Semester Satu"value="<?= $bbs1 ?>" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class="mb-3">
                                                    <label class="text-label form-label">Berat Badan Semester Dua</label>
                                                    <input type="text" name="berat_badan_semester_dua" class="form-control" style="border-radius: 0;" placeholder="Berat Badan Semester Dua" value="<?= $bbs2 ?>">
                                                </div>
                                            </div>
                                            <hr>

                                                <!-- end tinggi badan dan berat badan -->

                                                <!-- penilaian kesehatan -->
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
                                                <!-- end penilaian kesehatan -->
                                                <div class="mb-2">
                                                <span class="fw-bold">Saran *</span>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Saran</label>
                                                    <input type="text" name="saran" class="form-control" style="border-radius: 0;" placeholder="saran" value="<?= $saran?>">
                                                </div>
                                            </div>
                                            <hr/>
                                                <!-- end saran saran -->

                                                <!-- status raport -->
                                                <div class="mb-2">
                                                    <span class="fw-bold">Status Raport *</span>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <label class="radio-inline me-3"><input required type="radio" name="status_raport" value="belum selesai" <?php if ($statusRaport=='belum selesai') {
                                                        echo 'checked';
                                                    } ?>>Belum Selesai</label>
                                                    <label class="radio-inline me-3"><input required type="radio" name="status_raport" value="selesai" <?php if ($statusRaport=='selesai') {
                                                        echo 'checked';
                                                    } ?>>Selesai</label>
                                                </div>
                                                <!-- end status raport -->
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
    <?php } ?>


</body>

</html>