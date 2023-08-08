<?php
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer-master/PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/PHPMailer-master/src/SMTP.php';
session_start();
include '../conn.php';

$nama_siswa = strtolower($_POST['nama_siswa']);
$email_siswa = $_POST['email_siswa'];
$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$no_telpon = $_POST['no_telpon'];
$nama_ibu = strtolower($_POST['nama_ibu']);
$role_id = $_POST['role_id'];
$kelas_id = $_POST['kelas_id'];
$kelas_nama = $_POST['kelas'];
$role_nama = $_POST['role'];
$username = strtolower($_POST['username']);
$password = $_POST['password'];
$jenis_kelamin = $_POST['jenis_kelamin'];

// menegcek apakah ada data siswa yang sama
$cekDataSiswa = mysqli_query($conn, "SELECT * FROM user WHERE nis = '$nis' ");
$result = mysqli_fetch_array($cekDataSiswa);
if ($result) {
    $_SESSION['status-fail'] = "Siswa Sudah Ada";
} else {
    
    // menambahkan data siswa
    $addSiswa = mysqli_query($conn, "INSERT INTO `user`(`id`, `nama`, `photo`, `email`, `no_hp`, `username`, `password`, `alamat`, `kelas`, `status`, `role`, `nama_wali_murid`, `no_hp_wali_murid`, `nis`, `nisn`,`jenis_kelamin`) VALUES ('','$nama_siswa','','$email_siswa','$no_telpon','$username','$password','','$kelas_id','y','$role_id','$nama_ibu','$no_telpon','$nis','$nisn', '$jenis_kelamin')");

    if ($addSiswa) {
        $_SESSION['status-info'] = "Siswa Berhasil Ditambahkan";

        $mail = new PHPMailer();
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'fedrianarahman21@gmail.com';
            $mail->Password = 'zmlcpmwkljevadmo';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('fedrianarahman21@gmail.com', 'Verifikasi');
            $mail->addAddress($email_siswa, 'Rahman Fedriana');

            $mail->isHTML(true);
            $mail->Subject = "Aktivasi Akun Guru SDN LEUWILIANG 01";
            $mail->Body = "Hi $nama_siswa, siswa SDN 01 Leuwiliang kelas $kelas Akun Anda Sudah Terdaftar. Berikut Username dan Password:<br/>Username: $username<br/>Password: $password";
            $mail->AltBody = '';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['status-fail'] = "Siswa Tidak Berhasil Dimasukkan";
    }
    
}
header("Location: ../../dataUser.php?nama_kelas=$kelas_nama");
exit(); // Menghentikan eksekusi kode selanjutnya


?>