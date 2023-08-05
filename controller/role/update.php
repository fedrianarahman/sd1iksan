<?php
session_start();

include "../conn.php";

$id = $_POST['id'];
$role = $_POST['role'];


$query = mysqli_query($conn, "UPDATE `role` SET `role_name`='$role' WHERE `id`='$id'");


if ($query) {
    $_SESSION['status-info'] = "Data berhasil di perbarui";
}else{
    $_SESSION['status-info'] = "Data tidak berhasil di perbarui";
}


header("Location:../../dataRole.php");