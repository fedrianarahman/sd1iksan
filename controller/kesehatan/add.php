<?php
session_start();
include '../conn.php';

$kesehatan = trim(strtolower($_POST['kesehatan']));
$created_at = date('Y-m-d H:i:s');

// mengcek apakah sudah ada data jam yang ditambahkan
$cek = mysqli_query($conn, "SELECT * FROM kesehatan WHERE jenis_kesehatan = '$kesehatan'");
$r = mysqli_fetch_array($cek);

if ($r) {
    $_SESSION['status-fail'] = "Jam Pelajaran Sudah Ada";
} else {
    
    $addJam = mysqli_query($conn, "INSERT INTO `kesehatan`(`id`, `jenis_kesehatan`, `created_at`, `updated_at`) VALUES ('','$kesehatan','$created_at','')");

    if ($addJam) {
        $_SESSION['status-info'] = "Jam Pelajaran Berhasil Ditambahkan";
    } else {
        $_SESSION['status-fail'] ="Jam Tidak Berhasil ditambahkan";
    }
    
}

header("Location:../../datakesehatan.php");

?>