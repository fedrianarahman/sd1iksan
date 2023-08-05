<?php
session_start();
include '../conn.php';

$jam_pelajaran = trim($_POST['jam_pelajaran']);
$updated_at = date('Y-m-d H:i:s');
$created_at = $_POST['created_at'];
$id = $_POST['id'];

// mengcek apakah sudah ada data jam yang ditambahkan
$cek = mysqli_query($conn, "SELECT * FROM jam_pelajaran WHERE jam_pelajaran = '$jam_pelajaran'");
$r = mysqli_fetch_array($cek);

if ($r) {
    $_SESSION['status-fail'] = "Jam Pelajaran Sudah Ada";
} else {
    
    $addJam = mysqli_query($conn, "UPDATE `jam_pelajaran` SET `jam_pelajaran`='$jam_pelajaran',`created_at`='$created_at',`updated_at`='$updated_at' WHERE `id`='$id'");

    if ($addJam) {
        $_SESSION['status-info'] = "Jam Pelajaran Berhasil Dirubah";
    } else {
        $_SESSION['status-fail'] ="Jam Tidak Berhasil Dirubah";
    }
    
}

header("Location:../../dataJamPelajaran.php");

?>