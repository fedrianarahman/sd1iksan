<?php
session_start();
include './controller/conn.php';
$kelas= $_SESSION['kelas'];
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
	<title><?php include './include/titleweb.php'?> | Data Siswa</title>

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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Siswa</a></li>
					</ol>
				</div>

				<div class="row">
                <div class="col-12">
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
                                <h4 class="card-title">Data Data Guru</h4>
                                <a class="btn btn-primary" href="./addGuru.php">Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Tugas Mengajar/Wali Kelas</th>
                                                <th>Jumlah Ngajar Per Minggu</th>
                                                <th>Tugas Lain</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ambilDataSiswa = mysqli_query($conn, "SELECT user.id AS id_user, user.nama AS nama_user,user.email AS email_user,user.nip_guru AS nip_guru,user.tugas_lain AS tugas_lain,user.jumlah_jam_mengajar AS jumlah_jam_mengajar,user.photo AS photo,user.no_hp AS no_hp_user,user.status AS status_user, user.kelas AS kelas  FROM user INNER JOIN role ON role.id = user.role  WHERE role.id = 3");
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($ambilDataSiswa)) {
											?>
                                           <tr>
												<td><strong><?php echo $i++ ?></strong></td>
												<td>
													<?php
													if ($data['photo']!='') {
														
													 ?>
													 <div class="d-flex align-items-center"><img src="./images/image-profile/<?php echo $data['photo']?>" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no"><?php echo $data['nama_user']?></span></div>
													 <?php }else{?>
														<div class="d-flex align-items-center"><img src="./images/image-profile/5.png" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no"><?php echo $data['nama_user']?></span></div>
													<?php }?>
												</td>
												<td><?php echo $data['nip_guru']?></td>
												<td><?php if ($data['kelas'] == null) {
                                                    echo "-";
                                                } else{
                                                    echo $data['kelas'];
                                                }?></td>
												<!-- <td>24</td> -->
												<td><?php if ($data['jumlah_jam_mengajar']==null) {
                                                    echo "-";
                                                }else{
                                                    echo $data['jumlah_jam_mengajar'];
                                                }?></td>
												<td><?php if ($data['tugas_lain']==null) {
                                                    echo "-";
                                                } else {
                                                    echo $data['tugas_lain'];
                                                }
                                                ?></td>
												<td>
													<?php if ($data['status_user']=='y') {
														echo '<span class="badge badge-success">Aktif</span>';
													} else {
														echo '<span class="badge badge-danger">Non Aktif</span>';
													}
													?>
												</td>
												<td>
													<div class="d-flex">
														<a href="./detailGuru.php?id_guru=<?php echo $data['id_user']?>" class="btn btn-warning me-2 shadow btn-xs sharp" data-toggle="tooltip" title="Lihat"><i class="fa fa-eye"></i></a>
														<a href="./editGuru.php?id_guru=<?php echo $data['id_user']?>" class="btn btn-primary shadow btn-xs sharp me-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
														<a href="./controller/guru/delete.php?id_guru=<?php echo $data['id_user']?>" class="btn btn-danger shadow btn-xs sharp" data-toggle="tooltip" title="hapus"><i class="fa fa-trash"></i></a>

													</div>
												</td>
											</tr>
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
    <?php
    if ($_SESSION['level'] == 'admin') {
        
    ?>
    <script src="js/styleSwitcher.js"></script>
    <?php }?>


</body>

</html>