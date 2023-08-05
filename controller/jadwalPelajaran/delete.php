<?php
session_start();
include '../conn.php';

$id = $_GET['id_jadwal'];
$idKelas = $_GET['id_kelas'];
$nama_kelas = $_GET['nama_kelas'];
$query = mysqli_query($conn, "DELETE FROM jadwal_pelajaran WHERE id ='$id'");

if ($query) {
    $_SESSION['status-info'] = "Data Berhasil Dihapus";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Dihapus";
}

header("Location:../../dataJadwalPelajaran.php?id=$idKelas&nama_kelas=$nama_kelas");
?>