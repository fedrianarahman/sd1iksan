<?php
session_start();
include "../conn.php";

// mengambil value dari form tambah data pelajaran
$pelajaran = trim(strtolower($_POST['pelajaran']));

// mengecek apakah ada data pelajaran yang sama atau tidak
$cekDataPelajaran = mysqli_query($conn, "SELECT * FROM `mapel` WHERE mapel = '$pelajaran'");
$cekData = mysqli_fetch_array($cekDataPelajaran);

if ($cekData) {
    $_SESSION['status-fail'] = "Nama Pelajaran Sudah Ada";
} else {
    // simpan data pelajaran ke database
    $tambahDataPelajaran= mysqli_query($conn, "INSERT INTO `mapel`(`id`, `mapel`) VALUES ('','$pelajaran')");

    if ($tambahDataPelajaran) {
        $_SESSION['status-info'] = "Data berhasi dimasukkan";
    }else{
        $_SESSION['status-fail'] = "Data tidak berhasil di masukkan";
    }
}

header("Location:../../dataPelajaran.php");
