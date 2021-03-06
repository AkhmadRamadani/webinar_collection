<?php
session_start();
include "config/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Webion - Login Page</title>
    <link rel="icon" type="image/x-icon" href="styles/assets/img/logo.png" />
    <link href="styles/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="styles/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="styles/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="styles/assets/css/forms/switches.css">
</head>

<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <div class="mb-4"><a href="index.php">
                                <img src="styles/assets/img/webion.png" style="width:20%; height:20%;"></a>
                        </div>
                        <h1 class="">Login</h1>
                        <p class="">Log in to your account to continue.</p>

                        <form class="text-left" method="POST">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="NAMA">EMAIL</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input type="text" name="NAMA" class="form_login" placeholder="Email">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="PASSWORD">PASSWORD</label>
                                        <a href="forgotpass.php" class="forgot-pass-link">Forgot Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="PASSWORD" type="password" class="form_login" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="d-sm-flex justify-content-between mb-3">
                                    <div class="field-wrapper">
                                        <button class="btn btn-primary" name="LOGIN">Log In</button>
                                    </div>
                                </div>

                                <!-- <div class="division">
                                    <span>OR</span>
                                </div> -->

                                <!-- <div class="social">
                                    <a href="javascript:void(0);" class="btn social-fb">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                        </svg>
                                        <span class="brand-name">Facebook</span>
                                    </a>
                                    <a href="javascript:void(0);" class="btn social-github">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>
                                        <span class="brand-name">Github</span>
                                    </a>
                                </div> -->

                                <p class="signup-link">Not registered ? <a href="registrasi.php">Create an account</a></p>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    //klik tombol login
    if (isset($_POST["LOGIN"])) {
        $username = $_POST["NAMA"];
        $password = md5($_POST["PASSWORD"]);
        //lakukan pengecekan akun di table user
        $ambil = $connect->query("SELECT u.*, ud.BIODATA, 
        ud.PENDIDIKAN, ud.PEKERJAAN, 
        ud.FOTO_PROFILE, ud.BUKTI_IJAZAH,
        am.MESSAGE, am.STATUS_PROPOSAL 
        FROM user u 
        LEFT JOIN user_detail ud 
        ON u.USER_ID = ud.USER_ID
        LEFT JOIN acc_mentor am 
        ON u.USER_ID = am.USER_ID
                    where EMAIL='$username' AND PASSWORD='$password'");

        //menghitung akun yg terpanggil
        $akunyangcocok = $ambil->num_rows;

        //jika 1 akun yg cocok maka akan login
        if ($akunyangcocok == 1) {
            //anda sudah login
            //dapatkan akun dlm bentuk array
            $akun = $ambil->fetch_assoc();
            //simpan disession daftar user
            $_SESSION["user"] = $akun;
            $name = $akun['NAMA'];
            echo "<script>alert('Halo Selamat datang $name'); </script>";
            echo "<script>location='index.php';</script>";
        } else {
            //anda gagal login
            echo "<script>alert('Anda gagal login, periksa username atau password anda'); </script>";
            echo "<script>location='login.php';</script>";
        }
    }
    ?>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="styles/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="styles/bootstrap/js/popper.min.js"></script>
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="styles/assets/js/authentication/form-2.js"></script>
    <script>
        var loaderElement = document.querySelector('#load_screen');
        setTimeout(function() {
            loaderElement.style.display = "none";
        }, 3000);
    </script>
</body>

</html>