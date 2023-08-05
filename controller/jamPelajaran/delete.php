<?php
session_start();
include '../conn.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM jam_pelajaran WHERE id ='$id'");

if ($query) {
    $_SESSION['status-info'] = "Data Berhasil Dihapus";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Dihapus";
}

header("Location:../../dataJamPelajaran.php");
?>