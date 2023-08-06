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
$role = '3';
$username = $_POST['username'];
$password = $_POST['password'];
// Tambahan
$nip_guru = $_POST['nip_guru'];
$tugasLain = $_POST['tugas_lain'];
$mengajarKhusus =  $_POST['mengajar_khusus'];
$jumlahJamPengajaran = $_POST['jumlah_mengajar_perminggu'];

$ambilDataUser = mysqli_query($conn, "SELECT * FROM user WHERE kelas ='$kelas' ");
$cekData = mysqli_fetch_array($ambilDataUser);

if ($cekData) {
    $_SESSION['status-fail'] = "Wali kelas sudah ada $kelas";
}else{
    $tambahDataGuru = mysqli_query($conn, "INSERT INTO `user`(`id`, `nama`, `email`, `no_hp`, `username`, `password`,  `kelas`, `status`, `role`,`tugas_mengajar`, `nip_guru`, `jumlah_jam_mengajar`, `tugas_lain`) VALUES ('','$nama','$email','$no_hp','$username','$password','$kelas','y','$role','$mengajarKhusus','$nip_guru','$jumlahJamPengajaran','$tugasLain')");
    
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
