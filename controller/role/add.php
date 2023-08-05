<?php
session_start();
include "../conn.php";

// mengambil value dari form tambah data role
$role = $_POST['role'];

// mengecek apakah ada data role yang sama atau tidak
$cekDataRole = mysqli_query($conn, "SELECT * FROM `role` WHERE role_name like '%" . $role . "%'");
$cekData = mysqli_fetch_array($query);

if (!empty($cekData['role_name'])) {
    $_SESSION['status-fail'] = "Nama role Ada";
} else {
    // simpan data role ke database
    $tambahDataPelajaran= mysqli_query($conn, "INSERT INTO `role`(`id`, `role_name`) VALUES ('','$role')");

    if ($tambahDataPelajaran) {
        $_SESSION['status-info'] = "Data berhasi dimasukkan";
    }else{
        $_SESSION['status-fail'] = "Data tidak berhasil di masukkan";
    }
}

header("Location:../../dataRole.php");
