<?php
session_start();

include "../conn.php";

$id = $_POST['id'];
$kelas = strtolower($_POST['kelas']);


$query = mysqli_query($conn, "UPDATE `kelas` SET `kelas`='$kelas' WHERE `id`='$id'");


if ($query) {
    $_SESSION['status-info'] = "Data berhasil di perbarui";
}else{
    $_SESSION['status-info'] = "Data tidak berhasil di perbarui";
}


header("Location:../../dataKelas.php");