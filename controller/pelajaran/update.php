<?php
session_start();

include "../conn.php";

$id = $_POST['id'];
$mapel = $_POST['mapel'];


$query = mysqli_query($conn, "UPDATE `mapel` SET `mapel`='$mapel' WHERE `id`='$id'");


if ($query) {
    $_SESSION['status-info'] = "Data berhasil di perbarui";
}else{
    $_SESSION['status-info'] = "Data tidak berhasil di perbarui";
}


header("Location:../../dataPelajaran.php");