<?php
session_start();
include '../conn.php';

$idSiswa = $_GET['id_siswa'];
$kelas = $_GET['nama_kelas'];
// mengahpus data siswa
$query = mysqli_query($conn, "DELETE FROM user WHERE id = '$idSiswa'");

if ($query) {
    $_SESSION['status-info'] = "Data Siswa Berhasil Dihapus";
} else {
    $_SESSION['status-fail'] = "Data Siswa Tidak Berhasil Dihapus";
}
header("Location:../../dataUser.php?nama_kelas=$kelas");
?>