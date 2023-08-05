<?php
// koneksi database
session_start();
include '../conn.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id_mapel'];

$hapus_data = mysqli_query($conn, "DELETE FROM `mapel` WHERE id ='$id'");

if ($hapus_data) {
    $_SESSION['status-info'] = "Data berhasil di hapus";
}else{
    $_SESSION['status-fail'] = "Data gagal di hapus";
}


header("Location:../../dataPelajaran.php");
?>