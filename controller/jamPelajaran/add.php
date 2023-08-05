<?php
session_start();
include '../conn.php';

$jam_pelajaran = trim($_POST['jam_pelajaran']);
$created_at = date('Y-m-d H:i:s');

// mengcek apakah sudah ada data jam yang ditambahkan
$cek = mysqli_query($conn, "SELECT * FROM jam_pelajaran WHERE jam_pelajaran = '$jam_pelajaran'");
$r = mysqli_fetch_array($cek);

if ($r) {
    $_SESSION['status-fail'] = "Jam Pelajaran Sudah Ada";
} else {
    
    $addJam = mysqli_query($conn, "INSERT INTO `jam_pelajaran`(`id`, `jam_pelajaran`, `created_at`, `updated_at`) VALUES ('','$jam_pelajaran','$created_at','')");

    if ($addJam) {
        $_SESSION['status-info'] = "Jam Pelajaran Berhasil Ditambahkan";
    } else {
        $_SESSION['status-fail'] ="Jam Tidak Berhasil ditambahkan";
    }
    
}

header("Location:../../dataJamPelajaran.php");

?>