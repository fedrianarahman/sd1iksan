<?php
session_start();
include '../conn.php';

$nama = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
// absensi
$hadir = $_POST['hadir'];
$izin = $_POST['izin'];
$sakit = $_POST['sakit'];
$alpa = $_POST['alpa'];

date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke WIB (Waktu Indonesia Bagian Barat)

$created_at = null;
if (isset($_POST['tgl_absen']) && !empty($_POST['tgl_absen'])) {
    $created_at = $_POST['tgl_absen'];
} else {
    $created_at = date('Y-m-d');
}


for ($i = 0; $i < count($nama); $i++) { 
    $newNama = $nama[$i];
    $currentHadir = isset($hadir[$i]) ? $hadir[$i] : '';
    $currentIzin = isset($izin[$i]) ? $izin[$i] : '';
    $currentSakit = isset($sakit[$i]) ? $sakit[$i] : '';
    $currentAlpa = isset($alpa[$i]) ? $alpa[$i] : '';
    
    // Menambahkan Data Absensi
    $addAbsensi = mysqli_query($conn, "INSERT INTO `absensi`(`id`, `nama_siswa`, `idKelas`, `hadir`, `izin`, `sakit`, `alpa`, `created_at`) VALUES ('','$newNama','$kelas','$currentHadir','$currentIzin','$currentSakit','$currentAlpa','$created_at')");

    if ($addAbsensi) {
        $_SESSION['status-info'] = "Data Berhasil Dimasukkan";
    } else {
        $_SESSION['status-fail'] = "Data Tidak Berhasil Dimasukkan";
    }
}
header("Location:../../dataAbsensi.php");
?>
