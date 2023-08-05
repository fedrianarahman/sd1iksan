<?php
session_start();
include '../conn.php';

$idGuru = $_GET['id_guru'];

$query = mysqli_query($conn, "DELETE FROM user WHERE id ='$idGuru'");

if ($query) {
    $_SESSION['status-info'] = "Data Berhasil Dihapus";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Dihapus";
}

header("Location:../../dataGuru.php");
?>