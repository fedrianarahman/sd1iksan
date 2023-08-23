<?php
session_start();
include("../conn.php");

$kelas =strtolower( $_POST['kelas']);


$cek = mysqli_query($conn, "SELECT * FROM `kelas` WHERE kelas like '%".$kelas."%'"); 
$cekDataKelas = mysqli_fetch_array($cek);

if (!empty($cekDataKelas['kelas'])) {
    $_SESSION['status-fail'] = "Nama Kelas Sudah Ada";

} else {
    
    $tambahKelas = mysqli_query($conn, "INSERT INTO `kelas`(`id`, `kelas`) VALUES ('','$kelas')");
    if ($tambahKelas) {
        $_SESSION['status-info'] = "Data berhasi dimasukkan";
    }else{
        // echo '<script>alert("Gagal Terhubung Kedatabase");</script>';
        $_SESSION['status-fail'] = "Data tidak berhasil di masukkan";
    }
}

header("Location:../../dataKelas.php");

?>