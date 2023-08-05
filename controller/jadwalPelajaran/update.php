<?php
session_start();
include '../conn.php';
$id_jadwal = $_POST['id_jadwal'];
$idKelas = $_POST['id_kelas'];
$namaKelas = $_POST['nama_kelas'];
$jam = $_POST['jam_pelajaran'];
$created_at = $_POST['created_at'];
$senin = $_POST['senin'];
$selasa = $_POST['selasa'];
$rabu = $_POST['rabu'];
$kamis = $_POST['kamis'];
$jumat = $_POST['jumat'];
$sabtu = $_POST['sabtu'];
$updated = date('Y-m-d H:i:s');
if (isset($_POST['istirahat'])) {
    $senin = "istirahat";
    $selasa = "istirahat";
    $rabu = "istirahat";
    $kamis = "istirahat";
    $jumat = "istirahat";
    $sabtu = "istirahat";
}

// mengubah data
$updateData = mysqli_query($conn, "UPDATE `jadwal_pelajaran` SET `idKelas`='$idKelas',`waktu`='$jam',`senin`='$senin',`selasa`='$selasa',`rabu`='$rabu',`kamis`='$kamis',`jumat`='$jumat',`sabtu`='$sabtu',`created_at`='$created_at',`updated_at`='$updated' WHERE `id`='$id_jadwal'");

if ($updateData) {
    $_SESSION['status-info'] = "Jadwal Pelajaran Berhasil Dirubah";
} else {
    $_SESSION['status-fail'] = "Jadwal Pelajaran Gagal Dirubah";
}

header("Location:../../dataJadwalPelajaran.php?id=$idKelas&nama_kelas=$namaKelas");
?>