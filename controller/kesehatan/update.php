<?php
session_start();
include '../conn.php';

$jam_pelajaran = trim(strtolower($_POST['kesehatan']));
$updated_at = date('Y-m-d H:i:s');
$created_at = $_POST['created_at'];
$id = $_POST['id'];

// mengcek apakah sudah ada data jam yang ditambahkan
$cek = mysqli_query($conn, "SELECT * FROM kesehatan WHERE jenis_kesehatan = '$jam_pelajaran'");
$r = mysqli_fetch_array($cek);

if ($r) {
    $_SESSION['status-fail'] = "Jam Pelajaran Sudah Ada";
} else {
    
    $addJam = mysqli_query($conn, "UPDATE `kesehatan` SET `jenis_kesehatan`='$jam_pelajaran',`created_at`='$created_at',`updated_at`='$updated_at' WHERE `id`='$id'");

    if ($addJam) {
        $_SESSION['status-info'] = "Jam Pelajaran Berhasil Dirubah";
    } else {
        $_SESSION['status-fail'] ="Jam Tidak Berhasil Dirubah";
    }
    
}

header("Location:../../dataKesehatan.php");

?>