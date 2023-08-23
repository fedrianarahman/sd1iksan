<?php
session_start();

include "../conn.php";

$id = $_GET["id"];
$kelas = $_GET['nama_kelas'];

$cek = mysqli_query($conn, "SELECT status FROM user WHERE id='$id'");
$result = mysqli_fetch_array($cek);

if($result["status"] == "y"){
  $query = mysqli_query($conn, "UPDATE user SET status='N' where id='$id'");
  if($query){
    $_SESSION['status-info'] = "Status berhasil di perbarui";
  } else {
    $_SESSION['status-fail'] = "Status tidak berhasil di perbarui";
  }
} else {
  $query = mysqli_query($conn, "UPDATE user SET status='y' where id='$id'");
  if($query){
    $_SESSION['status-info'] = "Status berhasil di perbarui";
  } else {
    $_SESSION['status-fail'] = "Status tidak berhasil di perbarui";
  }
}

header("Location:../../dataUser.php?nama_kelas=$kelas");

?>
