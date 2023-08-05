<!DOCTYPE html>
<?php
session_start();
include './controller/conn.php';
// Cek apakah sesi login telah diatur
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
$idUser = $_SESSION['idSiswa'];
?>

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
    <title>SDN 01 Leuwiliang| Profile</title>

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
        <?php
        include './include/navHeader.php';
         ?>
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
                    </ol>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo rounded"></div>
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
                                        <?php
                                        $getPhoto = mysqli_query($conn, "SELECT * FROM user WHERE id = '$idUser'");
                                        while ($dataPhoto = mysqli_fetch_array($getPhoto)) {
                                            
                                        ?>
										<img src="./images/image-profile/<?php echo $dataPhoto['photo'] ?>" class="img-fluid rounded-circle" alt="">
                                        <?php }?>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        <?php
                        if (isset($_SESSION['status-info'])) {
                            echo '
                    <div class="alert alert-success solid alert-end-icon alert-dismissible fade show">
                                    <span><i class="mdi mdi-check"></i></span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button> ' . $_SESSION['status-info'] . '
                                </div>';
                            unset($_SESSION['status-info']);
                        }
                        if (isset($_SESSION['status-fail'])) {
                            echo '
                            <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-help"></i></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                            <strong>Error!</strong> '. $_SESSION['status-fail'] .'
                        </div>';
                            unset($_SESSION['status-fail']);
                        }
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                           
                                            <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link active show">Profile</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="profile-settings" class="tab-pane fade active show">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary mb-4">Account Setting</h4>
                                                        <form method="POST" enctype="multipart/form-data" action="./controller/user/updateProfile.php">
                                                            <?php
                                                           $getDataUser = mysqli_query($conn, "SELECT user.nama AS nama_user, user.photo AS photo_user, user.email AS email_user, user.no_hp AS no_hp_user, user.username AS username, user.password AS password, user.jenis_kelamin AS jenis_kelamin, user.tempat_lahir AS tempat_lahir, user.tgl_lahir AS tgl_lahir 
                                                           FROM user 
                                                           INNER JOIN role ON role.id = user.role 
                                                           WHERE user.id = '$idUser'");
                                                       
                                                            while ($dataUser = mysqli_fetch_array($getDataUser)) { 
                                                            ?>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Upload Photo</label>
                                                                    <input type="file" placeholder="Photo" class="form-control" name="photo">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Nama</label>
                                                                    <input type="text" placeholder="Nama" class="form-control" name="nama" value="<?php echo $dataUser['nama_user'] ?>">
                                                                    <input hidden type="text" placeholder="Nama" class="form-control" name="id_user" value="<?php echo $idUser ?>">
                                                                    <input hidden type="text" placeholder="Nama" class="form-control" name="old_photo" value="<?php echo $dataUser['photo_user']?>">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" placeholder="Email" class="form-control" name="email" value="<?php echo $dataUser['email_user'] ?>">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">NO HP</label>
                                                                    <input type="text" placeholder="NO HP" class="form-control" name="no_hp" value="<?php echo $dataUser['no_hp_user'] ?>">
                                                                </div>
                                                                <div class="col-md-4 mb-3">
                                                                    <p class="mb-2">Jenis Kelamin</p>
                                                                    <label class="radio-inline me-3"><input type="radio" name="jenis_kelamin"
                                                                    value="L"
                                                                     <?php
                                                                     if ($dataUser['jenis_kelamin'] === 'L') {
                                                                        echo 'checked';
                                                                     }
                                                                     ?>> Laki-Laki</label>
                                                                    <label class="radio-inline me-3"><input type="radio"
                                                                    name="jenis_kelamin"
                                                                    value="P"
                                                                    <?php
                                                                    if ($dataUser['jenis_kelamin'] === 'P') {
                                                                        echo 'checked';
                                                                     }
                                                                    ?>
                                                                    >Perempuan</label>
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label class="form-label">Tempat Lahir</label>
                                                                    <input type="text" placeholder="Tempat Lahir" class="form-control" name="tempat_lahir" value="<?php echo $dataUser['tempat_lahir'] ?>">
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label class="form-label">Tanggal Lahir</label>
                                                                    <input type="date" placeholder="Tanggal Lahir" class="form-control" name="tgl_lahir" value="<?php echo $dataUser['tgl_lahir'] ?>">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Username</label>
                                                                    <input type="text" placeholder="username" class="form-control" name="username" value="<?php echo $dataUser['username'] ?>">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Password</label>
                                                                    <input type="password" placeholder="password" class="form-control" name="password" value="<?php echo $dataUser['password'] ?>">
                                                                </div>
                                                            </div>
                                                            <?php }?>
                                                            <button class="btn btn-primary float-right" type="submit" style="float: right;">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!-- Modal -->
									<div class="modal fade" id="replyModal">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Post Reply</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
												</div>
												<div class="modal-body">
													<form>
														<textarea class="form-control" rows="4">Message</textarea>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
													<button type="button" class="btn btn-primary">Reply</button>
												</div>
											</div>
										</div>
									</div>
                                </div>
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