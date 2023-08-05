<?php
session_start();
include '../conn.php';

$idSiswa = $_GET['id_siswa'];

// mengahpus data siswa
$query = mysqli_query($conn, "DELETE FROM user WHERE id = '$idSiswa'");
?>