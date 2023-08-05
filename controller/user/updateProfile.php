<?php
include '../conn.php';
session_start();

$idUser = $_POST['id_user'];
$nama = $_POST['nama'];
// Cek apakah gambar baru dipilih
if (!empty($_FILES['photo']['name'])) {
    $photo = upload();
    if (!$photo) {
        return false;
    }
} else {
    $photo = $_POST['old_photo'];
}
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];

$updateDataProfile = mysqli_query($conn ,"UPDATE `user` SET `nama`='$nama', `photo`  = '$photo',`email`='$email',`no_hp`='$no_hp',`tempat_lahir`='$tempat_lahir',`tgl_lahir`='$tgl_lahir',`jenis_kelamin`='$jenis_kelamin' WHERE `id`='$idUser'");

if ($updateDataProfile) {
    $_SESSION['status-info'] = "Profile Berhasil Dirubah";
} else {
    $_SESSION['status-fail'] = "Profile Gagal Dirubah";
}



function upload (){
    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error =  $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    if ($error === 4) {
        $_SESSION['status-fail'] = "Pilih Gambar Dulu";
        return false;
    }

    //cek apakah yang diupload Adalah Gambar

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png','svg','JPG','JPEG','PNG'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array( $ekstensiGambar,$ekstensiGambarValid)) {
        $_SESSION['status-fail'] = "Yang Anda Upload Bukan Gambar";
        return false;
    }

    // cek ukuran gambar jika terlalu besar

    if ($ukuranFile > 1000000) {
        $_SESSION['status-fail'] = "Ukuran GAmbar Terlalu Besar";
        return false;
    }

    // lolos pengecekan
    move_uploaded_file($tmpName, "../../images/image-profile/" . $namaFile);

	return $namaFile;

}

header("Location:../../profile.php");