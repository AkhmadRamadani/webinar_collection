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
    <title>CORK Admin Template - Login Page Register</title>
    <link rel="icon" type="image/x-icon" href="styles/assets/img/favicon.ico" />
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

                        <h1 class="">Register</h1>
                        <p class="signup-link register">Already have an account? <a href="loginPage.php">Log in</a></p>

                        <!-- Start Form Registrasi -->
                        <form class="text-left" method="POST">
                            <div class="form">

                                <!-- Username -->
                                <div id="username-field" class="field-wrapper input">
                                    <label for="name">NAMA</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Nama">
                                </div>
                                <!-- End Username -->

                                <!-- Email -->
                                <div id="email-field" class="field-wrapper input">
                                    <label for="email">EMAIL</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="email" name="email" type="text" value="" class="form-control" placeholder="Email">
                                </div>
                                <!-- End Email -->

                                <!-- Password -->
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <!-- End Password -->

                                <div class="field-wrapper terms_condition">
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" class="new-control-input">
                                            <span class="new-control-indicator"></span><span>I agree to the <a href="javascript:void(0);"> terms and conditions </a></span>
                                        </label>
                                    </div>

                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" name="create">Get Started!</button>
                                    </div>
                                </div>

                                <!-- End Form Registrasi -->

                                <div class="division">
                                    <span>OR</span>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['create'])) {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $sql = "INSERT INTO user (NAMA, EMAIL, PASSWORD) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            echo "<script>alert('Registrasi Akun anda berhasil!'); </script>";
            echo "<script>location='loginPage.php';</script>";
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    }

    ?>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="styles/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

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