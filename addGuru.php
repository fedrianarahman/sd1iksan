<?php
session_start();
include './controller/conn.php';
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
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
    <title><?php include './include/titleweb.php' ?></title>

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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Guru</a></li>
                    </ol>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Data Guru</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="" method="POST" action="./controller/guru/add.php">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Nama</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="nama guru" required="">

                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">NIP</label>
                                                    <input type="text" name="nip_guru" class="form-control" placeholder="NIP Guru" required="">

                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Email </label>
                                                    <input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="email" required="" name="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">No Telpon*</label>
                                                    <input type="text" name="no_hp" class="form-control" placeholder="No Telpon" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Wali Kelas</label>

                                                    <select class=" wide form-control" id="validationCustom05" name="kelas">
                                                        <option data-display="Select">Pilih</option>
                                                        <?php
                                                        $ambilDataKelas = mysqli_query($conn, "SELECT * FROM kelas WHERE kelas != 'all access'");
                                                        while ($data = mysqli_fetch_array($ambilDataKelas)) {
                                                        ?>
                                                            <option value="<?php echo $data["kelas"] ?>"><?php echo $data["kelas"] ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Guru</label>

                                                    <select class="default-select wide form-control" id="validationCustom05" name="role">
                                                        <option data-display="Select">Pilih</option>
                                                        <?php
                                                        $ambilDataKelas = mysqli_query($conn, "SELECT * FROM role WHERE  role_name= 'guru'");
                                                        while ($data = mysqli_fetch_array($ambilDataKelas)) {
                                                        ?>
                                                            <option value="<?php echo $data["id"] ?>"><?php echo $data["role_name"] ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Jumlah Mengajar Perminggu</label>
                                                    <input type="text" name="jumlah_mengajar_perminggu" class="form-control" placeholder="Jumlah Mengajar Perminggu" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Tugas Lain</label>
                                                    <input type="text" name="tugas_lain" class="form-control" placeholder="Tugas Lain" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Mengajar Khusus</label>
                                                    <input type="text" name="mengajar_khusus" class="form-control" placeholder="Mengajar Pelajaran Khusus" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Username</label>
                                                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                                </div>
                                            </div>


                                        </div>
                                        <a href="./dataGuru.php" class="btn btn-warning text-white">Kembali</a>
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
    <script src="js/styleSwitcher.js"></script>



</body>

</html>