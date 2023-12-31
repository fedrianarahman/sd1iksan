<?php
session_start();
include './controller/conn.php';
$idGuru = $_GET['id_guru'];
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
	<title>SDN 01 Leuwiliang| Detail Guru</title>

	<!-- FAVICONS ICON -->
	<?php include './include/iconWeb.php'?>
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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Bootstrap</a></li>
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
								<a class="btn btn-primary" href="./dataGuru.php">Kembali</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-responsive-md">
										<thead>
											<tr>
												<th><strong>Nama</strong></th>
												<th><strong>NIP</strong></th>
												<th><strong>Wali Kelas</strong></th>
												<th><strong>Email</strong></th>
												<th><strong>No Hp</strong></th>
												<th><strong>Status</strong></th>
												<th><strong>Alamat</strong></th>
                                                <th><strong>username</strong></th>
											</tr>
										</thead>
										<tbody>
										<?php
										$ambilDataGuru = mysqli_query($conn, "SELECT * FROM user INNER JOIN role ON role.id = user.role  WHERE user.id = '$idGuru'");
										
										$i = 1;
										while ($data = mysqli_fetch_array($ambilDataGuru)) {
											
										
										?>
											<tr>
												<td>
												<?php
													if ($data['photo']!='') {
														
													 ?>
													 <div class="d-flex align-items-center"><img src="./images/image-profile/<?php echo $data['photo']?>" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no"><?php echo $data['nama']?></span></div>
													 <?php }else{?>
														<div class="d-flex align-items-center"><img src="./images/image-profile/5.png" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no"><?php echo $data['nama']?></span></div>
													<?php }?>
												</td>
												<td><?php echo $data['nip_guru']?></td>
												<td><?php echo $data['kelas']?></td>
												<td><?php echo $data['email']?></td>
												<td><?php echo $data['no_hp']?></td>
												<td><?php if ($data['status']=='y') {
														echo '<span class="badge badge-success">Aktif</span>';
													} else {
														echo '<span class="badge badge-danger">Non Aktif</span>';
													}
													?></td>
												<td><?php echo $data['alamat']?></td>
                                                <td><?php echo $data['username']?></td>
											</tr>
											<?php
											$i++;
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