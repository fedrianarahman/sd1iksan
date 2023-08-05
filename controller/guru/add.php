<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer-master/PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/PHPMailer-master/src/SMTP.php';

session_start();
$conn = mysqli_connect("localhost", "root", "", "sd1");

$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$kelas = $_POST['kelas'];
$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];

$ambilDataUser = mysqli_query($conn, "SELECT * FROM user WHERE kelas ='$kelas' ");
$cekData = mysqli_fetch_array($ambilDataUser);

if ($cekData) {
    $_SESSION['status-fail'] = "Wali kelas sudah ada";
}else{
    $tambahDataGuru = mysqli_query($conn, "INSERT INTO `user`(`id`, `nama`, `photo`, `email`, `no_hp`, `username`, `password`, `alamat`, `kelas`, `status`, `role`) VALUES ('','$nama','photo','$email','$no_hp','$username','$password','alamat','$kelas','y','$role')");
    
    if ($tambahDataGuru) {
        $_SESSION['status-info'] = "Data Berhasil Ditambahkan";

        // Kirim email
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
            $mail->addAddress($email, 'Rahman Fedriana');

            $mail->isHTML(true);
            $mail->Subject = "Aktivasi Akun Guru SDN LEUWILIANG 01";
            $mail->Body = "Hi $nama, Akun Anda Sudah Terdaftar. Berikut Username dan Password:<br/>Username: $username<br/>Password: $password";
            $mail->AltBody = '';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['status-fail'] = "Data Tidak Berhasil Dimasukkan";
    }
}


header("Location: ../../dataGuru.php");
exit(); // Menghentikan eksekusi kode selanjutnya
?>
