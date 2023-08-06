<?php
session_start();
include '../conn.php';

$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$hadir = $_POST['hadir'];
$izin = $_POST['izin'];
$sakit = $_POST['sakit'];
$alpa = $_POST['alpa'];
$idAbsensi = $_POST['id_absensi'];
$updatedAt = date('Y-m-d H:i:s');

$update = mysqli_query($conn, "UPDATE `absensi` SET `nama_siswa`='$nama_siswa',`idKelas`='$kelas',`hadir`='$hadir',`izin`='$izin',`sakit`='$sakit',`alpa`='$alpa',`updated_at`='$updatedAt' WHERE `id`='$idAbsensi'");

if ($update) {
    $_SESSION['status-info'] = "Data Berhasil Dirubah";
} else {
    $_SESSION['status-fail'] = "Data Gagal dirubah";
}

header("Location:../../dataAbsensi.php");
?>