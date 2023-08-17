<?php
session_start();
// Cek apakah sesi login telah diatur
include './controller/conn.php';
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
// $kelas = $_GET['kelas'];
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
    <title><?php include './include/titleweb.php' ?>|Tambah Data Absensi</title>

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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Absensi</a></li>
                    </ol>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input Absensi</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="" action="./controller/absensi/edit.php" method="POST">
                                            <?php
                                            $idAbsensi =$_GET['id_absensi'];
                                            $getDataAbsensi = mysqli_query($conn, "SELECT * FROM absensi WHERE id ='$idAbsensi'");
                                            while ($dataAbsensi = mysqli_fetch_array($getDataAbsensi)) {
                                               
                                            ?>
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label fw-bold">Nama Siswa</label>
                                                        <input type="text" name="nama_siswa" class="form-control" readonly value="<?php echo $dataAbsensi['nama_siswa'] ?>">
                                                        <input hidden type="text" name="kelas" class="form-control" readonly value="<?php echo $dataAbsensi['idKelas'] ?>">
                                                        <input hidden type="text" name="id_absensi" class="form-control" readonly value="<?php echo $dataAbsensi['id'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-3" style="margin-top: 30px;">
                                                            <div class="form-check custom-checkbox mb-3 checkbox-success check-xl">
                                                                <input type="checkbox" class="form-check-input" id="customCheckBox" required="" name="hadir" value="hadir" <?php if ($dataAbsensi['hadir'] != null) {
                                                                    echo 'checked';
                                                                } ?> >
                                                                <label class="form-check-label text-success ml-4" for="customCheckBox">Hadir</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3" style="margin-top: 30px; font-weight:bold;">
                                                            <div class="form-check custom-checkbox mb-3 checkbox-warning check-xl">
                                                                <input type="checkbox" class="form-check-input" id="customCheckBox" required="" name="izin" value="izin" <?php if ($dataAbsensi['izin'] != null) {
                                                                    echo 'checked';
                                                                } ?>>
                                                                <label class="form-check-label fw-bold text-warning" for="customCheckBox">Izin</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3" style="margin-top: 30px; font-weight:bold;">
                                                            <div class="form-check custom-checkbox mb-3 checkbox-primary check-xl">
                                                                <input type="checkbox" class="form-check-input" id="customCheckBox" required="" name="sakit" value="sakit" <?php if ($dataAbsensi['sakit'] != null) {
                                                                    echo 'checked';
                                                                } ?>>
                                                                <label class="form-check-label text-primary" for="customCheckBox">Sakit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3" style="margin-top: 30px; font-weight:bold;">
                                                            <div class="form-check custom-checkbox mb-3 checkbox-danger check-xl">
                                                                <input type="checkbox" class="form-check-input" id="customCheckBox" required="" name="alpa" value="alpa" <?php if ($dataAbsensi['alpa'] != null) {
                                                                    echo 'checked';
                                                                } ?>>
                                                                <label class="form-check-label text-danger" for="customCheckBox">Alpa</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                        <a href="./dataAbsensi.php" class="btn btn-warning text-white">Kembali</a>
                                        <button class="btn btn-primary" style="float: right;">Save</button>
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
    <?php if ($_SESSION['level'] == 'admin') {

    ?>
        <script src="js/styleSwitcher.js"></script>
    <?php } ?>
    <script>
    const checkboxes = document.querySelectorAll('.form-check-input');
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            const rowIndex = this.getAttribute('data-row-index');
            checkboxes.forEach(otherCheckbox => {
                if (otherCheckbox !== this && otherCheckbox.getAttribute('data-row-index') === rowIndex) {
                    otherCheckbox.checked = false;
                }
            });
        }
    });
});
    </script>
</body>

</html>