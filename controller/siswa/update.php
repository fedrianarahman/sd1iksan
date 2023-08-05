<?php
session_start();
include '../conn.php';

$idSiswa = $_POST['id_siswa'];
$nama_siswa = trim(strtolower($_POST['nama_siswa']));
$email_siswa = $_POST['email_siswa'];
$nis = $_POST['nis'];
$nisn = $_POST['nisn'];
$no_hp = $_POST['no_telpon'];
$nama_ibu  =$_POST['nama_ibu'];
$role  =$_POST['role_id'];
$kelas = $_POST['kelas_id'];
$username = $_POST['username'];
$password = $_POST['password'];

// mengupdate data siswa;
$query = mysqli_query($conn, "UPDATE user SET nama = '$nama_siswa', email ='$email_siswa',nis='$nis',nisn='$nisn',no_hp='$no_hp',nama_wali_murid='$nama_ibu',role='$role',kelas='$kelas',username='$username',password='$password' WHERE id ='$idSiswa'");

if ($query) {
    $_SESSION['status-info'] = "Data Berhasil Dirubah";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Dirubah";
}

header("Location:../../dataSiswa.php");

?>