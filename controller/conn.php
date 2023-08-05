<?php
$server = "localhost";
$user = "root";
$password = "";
$db_name = "sd1";

$conn = mysqli_connect($server, $user, $password, $db_name);

if (!$conn) {
    echo '<script>alert("Gagal Terhubung Kedatabase");</script>';
}
?>