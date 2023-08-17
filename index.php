<?php
session_start();
// Cek apakah sesi login telah diatur
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
include './controller/conn.php';
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
    <title><?php include './include/titleweb.php' ?>| Dashboard</title>

    <!-- FAVICONS ICON -->
    <?php include './include/iconWeb.php' ?>
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
    <!-- <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div> -->
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Selamat Datang</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo $_SESSION['nama'] ?>
                    </ol>
                </div>
                <?php
                if ($_SESSION['level'] == 'admin') {
                ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="./dataGuru.php">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        $getDataGuru = mysqli_query($conn, "SELECT * FROM user WHERE role = '3'");
                                        $dataGuru = mysqli_num_rows($getDataGuru)
                                        ?>
                                        <h2 class="text-center text-success fw-bold"><?php echo $dataGuru ?></h2>
                                        <p class="text-center fs-20 fw-bold"> Data Guru</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="./dataUser.php">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        $getDatasiswa = mysqli_query($conn, "SELECT * FROM user WHERE role = '4'");
                                        $datasiswa = mysqli_num_rows($getDatasiswa)
                                        ?>
                                        <h2 class="text-center text-success fw-bold"><?php echo $datasiswa ?></h2>
                                        <p class="text-center fs-20 fw-bold"> Data Siswa</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="./dataKelas.php">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        $getDataKelas = mysqli_query($conn, "SELECT * FROM kelas");
                                        $dataKelas = mysqli_num_rows($getDataKelas);
                                        ?>
                                        <h2 class="text-center text-success fw-bold"><?php echo $dataKelas ?></h2>
                                        <p class="text-center fs-20 fw-bold"> Data Kelas</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="./dataPelajaran.php">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        $getDataMapel = mysqli_query($conn, "SELECT * FROM mapel");
                                        $dataMapel = mysqli_num_rows($getDataMapel);
                                        ?>
                                        <h2 class="text-center text-success fw-bold"><?php echo $dataMapel ?></h2>
                                        <p class="text-center fs-20 fw-bold"> Data Pelajaran</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <?php
                if ($_SESSION['level'] == 'guru') {
                ?>
                    <div class="row">
                        <div class="col-md-3">
                            <a href="./dataSiswa.php">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        $kelas = $_SESSION['kelas'];
                                        $getDataGuru = mysqli_query($conn, "SELECT * FROM user WHERE role = '4' AND kelas='$kelas'");
                                        $dataGuru = mysqli_num_rows($getDataGuru)
                                        ?>
                                        <h2 class="text-center text-success fw-bold"><?php echo $dataGuru ?></h2>
                                        <p class="text-center fs-20 fw-bold">Jumlah Siswa <?php echo $_SESSION['kelas'] ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <?php
                if ($_SESSION['level'] == 'siswa') {
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-center">Jumlah Ketidak Hadiran</h2>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered  table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th style="width:80px;"><strong>NO</strong></th>
                                                        <th><strong>Keterangan</strong></th>
                                                        <th><strong>Tanggal</strong></th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $namasiswa = $_SESSION['nama'];
                                                    $kelas = $_SESSION['kelas'];
                                                    $ambilDataRole = mysqli_query($conn, "SELECT 
                                                    *,
                                                    CASE
                                                        WHEN alpa IS NOT NULL THEN 'alpa'
                                                        WHEN izin IS NOT NULL THEN 'izin'
                                                        WHEN sakit IS NOT NULL THEN 'sakit'
                                                    END AS jenis_ketidak_hadir
                                                    FROM absensi
                                                    WHERE idKelas = '$kelas' AND hadir !='hadir'  AND nama_siswa = '$namasiswa' ORDER BY created_at DESC");
                                                    $nomor_ketidak_hadir = 1; // Inisialisasi nomor ketidak hadiran
                                                    while ($data = mysqli_fetch_array($ambilDataRole)) {
                                                        // Menentukan jenis ketidak hadiran
                                                        $jenis_ketidak_hadir = '';
                                                        if ($data['alpa'] != null) {
                                                            $jenis_ketidak_hadir = 'alpa';
                                                        } elseif ($data['izin'] != null) {
                                                            $jenis_ketidak_hadir = 'izin';
                                                        } elseif ($data['sakit'] != null) {
                                                            $jenis_ketidak_hadir = 'sakit';
                                                        }

                                                        // Menentukan warna badge berdasarkan jenis ketidak hadiran
                                                        $badge_class = '';
                                                        if ($jenis_ketidak_hadir == 'alpa') {
                                                            $badge_class = 'badge-danger text-danger light';
                                                        } elseif ($jenis_ketidak_hadir == 'izin') {
                                                            $badge_class = 'badge-warning text-warning light';
                                                        } elseif ($jenis_ketidak_hadir == 'sakit') {
                                                            $badge_class = 'badge-primary text-primary light';
                                                        }
                                                    ?>
                                                        <tr>
                                                            <td><strong><?php echo $nomor_ketidak_hadir ?></strong></td>
                                                            <td><span class="badge <?php echo $badge_class ?>"><?php echo $data[$jenis_ketidak_hadir] ?></span></td>
                                                            <td><?php $tglInput = strtotime($data['created_at']);
                                                                echo date('F d Y', $tglInput) ?></td>
                                                        </tr>
                                                        <?php
                                                         $nomor_ketidak_hadir++; // Inkremen nomor ketidak hadiran
                                                        ?>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
    <!-- <script src="js/demo.js"></script> -->
    <?php
    if ($_SESSION['level'] == 'admin') {

    ?>
        <script src="js/styleSwitcher.js"></script>
    <?php } ?>
    <script>
        function cardsCenter() {

            /*  testimonial one function by = owl.carousel.js */



            jQuery('.card-slider').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                //center:true,
                slideSpeed: 3000,
                paginationSpeed: 3000,
                dots: true,
                navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    800: {
                        items: 1
                    },
                    991: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    },
                    1600: {
                        items: 1
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                cardsCenter();
            }, 1000);
        });
    </script>

</body>

</html>