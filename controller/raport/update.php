<?php
session_start();
include '../conn.php';

$idSiswa = $_POST['id_siswa'];
$mapel_id = $_POST['mapel_id'];
$nilai_pelajaran = $_POST['nilai_pelajaran'];
$deskripsi_nilai_pelajaran = $_POST['deskripsi_nilai_pelajaran'];
$nilai_keterampilan = $_POST['nilai_keterampilan'];
$deskripsi_nilai_keterampilan = $_POST['deskripsi_nilai_keterampilan'];
$judulRaport = $_REQUEST['keterangan_raport'];
$izin = $_POST['izin'];
$alpha = $_POST['alpha'];
$sakit = $_POST['sakit'];
$saran = $_POST['saran'];
$tbs1 = $_POST['tinggi_badan_semester_satu'];
$tbs2 = $_POST['tinggi_badan_semester_dua'];
$bbs1 = $_POST['berat_badan_semester_satu'];
$bbs2 = $_POST['berat_badan_semester_dua'];
$sikapSosial = $_POST['keterangan_sikap_sosial'];
$sikapSpritual = $_POST['keterangan_sikap_spritual'];
$kesehatan_id = $_POST['kesehatan_id'];
$keterangan_kesehatan = $_POST['keterangan_kesehatan'];
$status_raport = $_POST['status_raport'];

for ($i = 0; $i < count($mapel_id); $i++) {
    $current_mapel_id = $mapel_id[$i];
    $current_nilai = $nilai_pelajaran[$i];
    $currentDeskripsiNilai = $deskripsi_nilai_pelajaran[$i];
    $current_nilai_keterampilan = $nilai_keterampilan[$i];
    $currentDeskripsiKeterampilan = $deskripsi_nilai_keterampilan[$i];
    
    // query update
    $updatedataRaport = mysqli_query($conn, "UPDATE `raport` SET `judul`='$judulRaport',`nilai_pelajaran`='$current_nilai',`deskripsi_nilai_pelajaran`='$currentDeskripsiNilai',`nilai_keterampilan`='$current_nilai_keterampilan',`deskripsi_nilai_keterampilan`='$currentDeskripsiKeterampilan',`izin`='$izin',`alfa`='$alpha',`sakit`='$sakit',`sikap_spritual`='$sikapSpritual',`sikap_sosial`='$sikapSosial',`saran`='$saran',`j_kesehatan`='$kesehatan_id[$i]',`ket_kesehatan`='$keterangan_kesehatan[$i]',`tbs1`='$tbs1',`tbs2`='$tbs2',`bbs1`='$bbs1',`bbs2`='$bbs2',`status_raport`='$status_raport' WHERE `idSiswa`='$idSiswa' AND `mapel`='$current_mapel_id'");
}

if ($updatedataRaport) {
    $_SESSION['status-info'] = 'Raport Berhasil Dirubah';
} else {
    $_SESSION['status-fail'] = "Raport Tidak Berhasil Dirubah";
}

header("Location:../../dataNilaiSiswa.php");
?>
