<?php
session_start();
include '../conn.php';
$idAbsensi = $_GET['id_absensi'];

$deleteAbsensi = mysqli_query($conn, "DELETE FROM absensi WHERE id ='$idAbsensi'");

if ($deleteAbsensi) {
    $_SESSION['status-info'] = "Data Berhasil Dihapus";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Dihapus";
}

header("Location:../../dataAbsensi.php");
