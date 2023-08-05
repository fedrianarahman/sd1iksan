<?php
include './controller/conn.php';
$idUser = $_SESSION['idSiswa'];
?>
<div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                SDN LEUWILIANG 01
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                              <p style="margin-top: 20px; font-weight:bold; color:#999;"><?php echo $_SESSION['nama']?></p>
                            </li>
							<li class="nav-item dropdown notification_dropdown">
                              <p style="margin-top: 20px;"><?php echo $_SESSION['level']?></p>
                            </li>
							<li class="nav-item dropdown  header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<?php
									$getPhoto = mysqli_query($conn, "SELECT * FROM user WHERE id = '$idUser'");
									$dataPhoto = mysqli_fetch_array($getPhoto);
									if ($dataPhoto && $dataPhoto['photo'] !== '') {
									?>
									<img src="images/image-profile/<?php echo $dataPhoto['photo']?>" width="56" alt="">
									<?php } else{?>
										<img src="images/image-profile/<?php echo $dataPhoto['photo']?>" width="56" alt="">
										<?php }?>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="profile.php" class="dropdown-item ai-icon">
										<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
										<span class="ms-2">Profile </span>
									</a>
									<a href="logout.php" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
										<span class="ms-2">Logout </span>
									</a>
								</div>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>