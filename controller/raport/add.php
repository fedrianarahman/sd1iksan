<?php
session_start();
include '../conn.php';

$siswa_id = $_POST['idSiswa'];
$mapel_id = $_POST['mapel_id'];
$nilai = $_POST['nilai'];
$nilaiKeterampilan = $_POST['nilai_keterampilan'];
$izin = $_POST['izin'];
$keterangan = $_POST['keterangan_raport'];
$alpha = $_POST['alpha'];
$sakit = $_POST['sakit'];
$kebersihan = $_POST['kebersihan'];
$kerajinan = $_POST['kerajinan'];
$kelakuan = $_POST['kelakuan'];
$saran = $_POST['saran'];

// tambahan
$deskripsiNilai = $_POST['deskripsi_nilai'];
$deskripsiKeterampilan = $_POST['deskripsi_keterampilan'];
$sikapSpritual = $_POST['keterangan_sikap_spritual'];
$sikapSosial = $_POST['keterangan_sikap_sosial'];
$kesehatan_id = $_POST['kesehatan_id'];
$keteranganKesehatan = $_POST['keterangan_kesehatan'];
$tbS1 = $_POST['tinggi_badan_semester_satu'];
$tbS2 = $_POST['tinggi_badan_semester_dua'];
$bbs1 = $_POST['berat_badan_semester_satu'];
$bbs2 = $_POST['berat_badan_semester_dua'];

// tambahan baru
$namasiswaUntukraprot = $_POST['nama_siswa_untuk_raport'];
$waliKelas = $_POST['wali_kelas'];
$kelas = $_POST['kelas'];
$statusRaport = $_POST['status_raport'];
date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke WIB (Waktu Indonesia Bagian Barat)
$created_at = date('Y-m-d H:i:s');
// mengecek status siswa yang sudah ada raportnya
$cekData = mysqli_query($conn, "SELECT * FROM raport WHERE idSiswa = '$siswa_id'");
$result = mysqli_fetch_array($cekData);

if (!empty($result)) {
    $_SESSION['status-fail'] = "Siswa Sudah memiliki nilai";
} else {

    for ($i = 0; $i < count($mapel_id)  ; $i++) {
        $current_mapel_id = $mapel_id[$i];
        $current_nilai = $nilai[$i];
        $currentDeskripsiNilai = $deskripsiNilai[$i];
        $currentDeskripsiKeterampilan = $deskripsiKeterampilan[$i];
        $nilai_keterampilan = $nilaiKeterampilan[$i];

        // baruditambahkan
        $currentKesehatanID = $kesehatan_id[$i];
        $currentKeteranganKesehatan = $keteranganKesehatan[$i];
    
        // $query = mysqli_query($conn, "INSERT INTO `raport`(`id`, `idSiswa`, `judul`, `mapel`, `nilai_pelajaran`, `deskripsi_nilai_pelajaran`, `nilai_keterampilan`, `deskripsi_nilai_keterampilan`, `izin`, `alfa`, `sakit`, `sikap_spritual`, `sikap_sosial`, `saran`, `j_kesehatan`, `ket_kesehatan`, `tbs1`, `tbs2`, `bbs1`, `bbs2`) VALUES ('','$siswa_id','$keterangan','$current_mapel_id','$current_nilai','$currentDeskripsiNilai','$nilai_keterampilan','$currentDeskripsiKeterampilan','$izin','$alpha','$sakit','$sikapSpritual','$sikapSosial','$saran','$kesehatan_id','$keteranganKesehatan','$tbS1','$tbS2','$bbs1','$bbs2')");

        $query = mysqli_query($conn, "INSERT INTO `raport`(`id`, `idSiswa`, `nama_siswa`, `kelas`, `wali_kelas`, `judul`, `mapel`, `nilai_pelajaran`, `deskripsi_nilai_pelajaran`, `nilai_keterampilan`, `deskripsi_nilai_keterampilan`, `izin`, `alfa`, `sakit`, `sikap_spritual`, `sikap_sosial`, `saran`, `j_kesehatan`, `ket_kesehatan`, `tbs1`, `tbs2`, `bbs1`, `bbs2`, `status_raport`,`created_at`) VALUES ('','$siswa_id','$namasiswaUntukraprot','$kelas','$waliKelas','$keterangan','$current_mapel_id','$current_nilai','$currentDeskripsiNilai','$nilai_keterampilan','$currentDeskripsiKeterampilan','$izin','$alpha','$sakit','$sikapSpritual','$sikapSosial','$saran','$currentKesehatanID','$currentKeteranganKesehatan','$tbS1','$tbS2','$bbs1','$bbs2','$statusRaport','$created_at')");
    
        if (!$query) {
            $_SESSION['status-fail'] = "Nilai Tidak Berhasil Ditambahkan";
            break; // Keluar dari loop jika ada kesalahan saat memasukkan nilai
        }
    }
    
    if (!isset($_SESSION['status-fail'])) {
        $_SESSION['status-info'] = "Nilai Berhasil Ditambahkan";
    }
}




header("Location:../../dataNilaiSiswa.php");

?>