<?php
session_start();
include '../conn.php';
$jam = $_POST['jam_pelajaran'];
$senin = $_POST['senin'];
$selasa = $_POST['selasa'];
$rabu = $_POST['rabu'];
$kamis = $_POST['kamis'];
$jumat = $_POST['jumat'];
$sabtu = $_POST['sabtu'];
$idKelas = $_POST['id_kelas'];
$namaKelas =$_POST['nama_kelas'];
$created_at = date('Y-m-d H:i:s');
$istirahat = $_POST['istirahat'];
if (isset($_POST['istirahat'])) {
    $senin = "istirahat";
    $selasa = "istirahat";
    $rabu = "istirahat";
    $kamis = "istirahat";
    $jumat = "istirahat";
    $sabtu = "istirahat";
}
// cek data
$cek = mysqli_query($conn, "SELECT * FROM jadwal_pelajaran WHERE waktu = '$jam' AND idKelas = '$idKelas'");
$r = mysqli_fetch_array($cek);

if ($r) {
    $_SESSION['status-fail'] = "Jadwal Sudah ada";
} else {
    $qury = mysqli_query($conn, "INSERT INTO `jadwal_pelajaran`(`id`, `idKelas`, `waktu`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`, `created_at`, `updated_at`) VALUES ('','$idKelas','$jam','$senin','$selasa','$rabu','$kamis','$jumat','$sabtu','$created_at','')");
    if ($qury) {
        $_SESSION['status-info'] = "Jadwal Berhasil Ditambahkan";
    } else {
        $_SESSION['status-fail'] = "Jadwal Tidak Berhasil Ditambahkan $idKelas";
    }
    
}


header("Location:../../dataJadwalPelajaran.php?id=$idKelas&nama_kelas=$namaKelas");
?>