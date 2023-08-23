<?php
session_start();
include '../conn.php';

$id_guru = $_POST['id_guru'];
$nama = trim(strtolower($_POST['nama']));
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$wakel = $_POST['kelas'];
$role = 3;
$username = $_POST['username'];
$password = $_POST['password'];

// mengupdate data guru
$query = mysqli_query($conn, "UPDATE user SET nama= '$nama', email='$email', no_hp='$no_hp',kelas='$wakel',role='$role',username='$username',password = '$password' WHERE id = '$id_guru'");

if ($query) {
    $_SESSION['status-info'] = "Data Berhasil Dirubah";
} else {
    $_SESSION['status-fail']= "Data Tidak Berhasil Dirubah";
}

header("Location:../../dataGuru.php");

?>