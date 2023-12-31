<?php
session_start();
include './controller/conn.php';
$kelas = $_GET['nama_kelas'];
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
	<title><?php include './include/titleweb.php' ?> | Data Siswa</title>

	<!-- FAVICONS ICON -->
	<?php include './include/iconWeb.php' ?>
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
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
        <?php include './include/navHeader.php'?>
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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Page</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Data Siswa</a></li>
					</ol>
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
							<div class="card-header">
								<h4 class="card-title">Data <?php echo $kelas ?></h4>
                                <a class="btn btn-primary" href="./addSiswa.php?kelas=<?php echo $kelas ?>">Tambah</a>
							</div>
							<div class="card-body">
                            <div class="table-responsive">
                                    <table id="example4" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Role</th>
												<th>kelas</th>
												<th>Status </th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ambilDataUser = mysqli_query($conn, "SELECT user.id AS id_user, user.nama AS nama_user,user.email AS email_user,user.photo AS photo,user.no_hp AS no_hp_user,user.status AS status_user,user.jenis_kelamin AS jenis_kelamin, user.kelas AS wali_kelas,role.role_name AS role_name  FROM user INNER JOIN role ON role.id = user.role  AND role.role_name ='siswa' AND user.kelas = '$kelas'");
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($ambilDataUser)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i?></td>
                                                <td><?php echo strtoupper($data['nama_user'])?></td>
                                                <td><?php echo $data['email_user']?></td>
                                                <td>
                                                <?php if ($data['role_name']=='guru') {
														echo '<span class="badge  badge-primary">Guru</span>';
													} elseif($data['jenis_kelamin']=='L' && $data['role_name']=='siswa') {
														echo '<span class="badge light badge-warning">siswa</span>';
													}elseif($data['jenis_kelamin']=='P' && $data['role_name']=='siswa') {
														echo '<span class="badge light badge-primary">siswi</span>';
													}?>
                                                </td>
                                                <td><?php echo $data['wali_kelas']?></td>
                                                <td>
                                                <?php if ($data['status_user']=='y') {
                                                        echo '<a href="./controller/user/updatestatus.php?id='.$data['id_user'].'&nama_kelas='.$kelas.'"><span class="badge light badge-success text-white">aktif</span></a>';
                                                    } else {
                                                        echo '<a href="./controller/user/updatestatus.php?id='.$data['id_user'].'&nama_kelas='.$kelas.'"><span class="badge light badge-danger">non aktif</span></a>';
                                                    }
                                                     ?>
                                                </td>
                                                <td>
													<div class="d-flex">
                                                    <a href="./detailSiswa.php?id_siswa=<?php echo $data['id_user']?>&nama_kelas=<?php echo $kelas ?>" class="btn btn-warning me-2 shadow btn-xs sharp" data-toggle="tooltip" title="Lihat"><i class="fa fa-eye"></i></a>
														<a href="editSiswa.php?id_siswa=<?php echo $data['id_user']?>&nama_kelas=<?php echo $kelas ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
														<a href="./controller/siswa/delete.php?id_siswa=<?php echo $data['id_user']?>>&nama_kelas=<?php echo $kelas ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>												
												</td>		
                                            </tr>
                                            <?php $i++?>
                                            <?php }?>
                                        </tbody>
                                    </table>
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
	<script src="vendor/global/global.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	
    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>


</body>

</html>