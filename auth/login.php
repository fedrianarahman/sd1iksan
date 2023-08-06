<?php
session_start();
include '../controller/conn.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cekDataUser = mysqli_query($conn, "SELECT user.id AS id_user, user.username, user.password, user.nama, user.email, user.kelas, role.role_name 
    FROM user  INNER JOIN role ON role.id = user.role");

    $loggedIn = false; // Flag untuk menandakan status login

    while ($result = mysqli_fetch_array($cekDataUser)) {
        if ($username == $result['username'] && $password == $result['password']) {
            $loggedIn = true;
            $_SESSION['nama'] = $result['nama'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['kelas'] = $result['kelas'];
            $_SESSION['level'] = $result['role_name'];
            $_SESSION['idSiswa'] = $result['id_user'];
            break; // Keluar dari loop jika data ditemukan
        }
    }
    
    if ($loggedIn) {
        header("Location: ../index.php");
        exit();
    } else {
        $error = true;
    }
} 

?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Admin Dashboard</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="../images/logo-fix.png" width="200" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4> 
                                    <?php
                                    if (isset($error)) : ?>
                                        <p style="color:red; font-style: italic; text-align: center;">username / password salah</p>

                                    <?php endif; ?>

                                    <form method="POST">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>