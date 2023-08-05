<?php
include './controller/conn.php';
session_start();
$idKelas = $_SESSION['kelas'];
?>
<div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    <!-- admin -->
					<?php
					if ($_SESSION['level']=='admin') {
					?>
					<li class="mm-active"><a href="index.php" class="mm-active" aria-expanded="false">
							<i class="fas fa-user-check"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>
					
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-info-circle"></i>
							<span class="nav-text"> Guru</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="dataGuru.php">Data Guru</a></li>
                            <li><a href="dataRole.php">Data Role</a></li>
							<li><a href="dataUser.php">Data Users</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-chart-line"></i>
							<span class="nav-text">Pelajaran</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="dataPelajaran.php">Data Pelajaran</a></li>
                        </ul>
                    </li>
					<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-book"></i>
							<span class="nav-text">Jadwal Pelajaran</span>
						</a>
                        <ul aria-expanded="false">
                            <?php
							$query = mysqli_query($conn, "SELECT * FROM kelas WHERE kelas.kelas !='all access'");
							while ($dataKelas = mysqli_fetch_array($query)) {
							?>
							<li><a href="dataJadwalPelajaran.php?id=<?php echo $dataKelas['id']?>&nama_kelas=<?php echo $dataKelas['kelas']?>"><?php echo $dataKelas['kelas']?></a></li>
							<?php }?>
                        </ul>
                    </li>
					<li ><a href="dataJamPelajaran.php" class="mm-active" aria-expanded="false">
							<i class="fas fa-clock"></i>
							<span class="nav-text">Jam Pelajaran</span>
						</a>
					</li>
					<li ><a href="dataKesehatan.php" class="mm-active" aria-expanded="false">
							<i class="fas fa-heart"></i>
							<span class="nav-text">Penilaian Kesehatan</span>
						</a>
					</li>
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fab fa-bootstrap"></i>
							<span class="nav-text">Kelas</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="dataKelas.php">Data Kelas</a></li>
                        </ul>
                    </li>
					<?php }?>

					<!-- guru -->
					<?php
					if ($_SESSION['level']=='guru') {
					?>
					<li class="mm-active"><a href="index.php" class="mm-active" aria-expanded="false">
							<i class="fas fa-user-check"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>
					<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-book"></i>
							<span class="nav-text">Jadwal Pelajaran</span>
						</a>
                        <ul aria-expanded="false">
                            <?php
							$query = mysqli_query($conn, "SELECT * FROM kelas WHERE kelas.kelas !='all access' AND kelas.kelas ='$idKelas'");
							while ($dataKelas = mysqli_fetch_array($query)) {
							?>
							<li><a href="dataJadwalPelajaran.php?id=<?php echo $dataKelas['id']?>&nama_kelas=<?php echo $dataKelas['kelas']?>"><?php echo $dataKelas['kelas']?></a></li>
							<?php }?>
                        </ul>
                    </li>
					<li ><a href="dataJamPelajaran.php" class="mm-active" aria-expanded="false">
							<i class="fas fa-clock"></i>
							<span class="nav-text">Jam Pelajaran</span>
						</a>
					</li>
					<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fab fa-bootstrap"></i>
							<span class="nav-text">My Class</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="dataSiswa.php">Data Siswa</a></li>
							<li><a href="dataNilaiSiswa.php">Data Raport</a></li>
                        </ul>
                    </li>
					<?php }?>

					<!-- siswa -->
					<?php
					if ($_SESSION['level']== 'siswa') {
					?>
					<li class="mm-active"><a href="index.php" class="mm-active" aria-expanded="false">
							<i class="fas fa-user-check"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>
					<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-book"></i>
							<span class="nav-text">Jadwal Pelajaran</span>
						</a>
                        <ul aria-expanded="false">
                            <?php
							$query = mysqli_query($conn, "SELECT * FROM kelas WHERE kelas.kelas !='all access' AND kelas.kelas ='$idKelas'");
							while ($dataKelas = mysqli_fetch_array($query)) {
							?>
							<li><a href="dataJadwalPelajaran.php?id=<?php echo $dataKelas['id']?>&nama_kelas=<?php echo $dataKelas['kelas']?>"><?php echo $dataKelas['kelas']?></a></li>
							<?php }?>
                        </ul>
                    </li>
					<li class=""><a href="dataRaport.php" class="mm-active" aria-expanded="false">
							<i class="fab fa-bootstrap"></i>
							<span class="nav-text">Raport</span>
						</a>
					</li>
					<?php }?>
                </ul>
				
			
			</div>
        </div>