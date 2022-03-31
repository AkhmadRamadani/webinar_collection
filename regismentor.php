<?php
session_start();
include "config/connection.php";
if (isset($_SESSION[''])) {
    if (isset($_POST['submit'])) {
        $alamat = $_POST['alamat'];
        $pendidikan = $_POST['pendidikan'];
        $pekerjaan = ($_POST['pekerjaan']);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO user_detail(detail_id, alamat, pekerjaan, pendidikan,) VALUES ('','$alamat', '$pekerjaan', '$pendidikan')";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                echo "<script>alert('Berikut adalah data mentor!')</script>";

                $alamat = "";
                $pendidikan = "";
                $pekerjaan = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Webion - Registrasi Mentor Page</title>
    <link href="sytles/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="sytles/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="sytles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="sytles/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="sytles/assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
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

                        <h1 class="">Data Mentor</h1>
                        <p class="signup-link register">Already have an account? <a href="loginPage.php">Log in</a></p>
                        <form class="text-left">
                            <div class="form">

                                <div id="alamat-field" class="field-wrapper input">
                                    <label for="alamat">ALAMAT</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="alamat" name="alamat" type="text" value="" class="form-control" placeholder="Alamat">
                                </div>

                                <div id="pendidikan-field" class="field-wrapper input">
                                    <label for="pendidikan">PENDIDIKAN</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="pendidikan" name="pendidikan" type="text" value="" class="form-control" placeholder="Pendidikan">
                                </div>

                                <div id="pekerjaan-field" class="field-wrapper input">
                                    <label for="pekerjaan">PEKERJAAN</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="pekerjaan" name="pekerjaan" type="text" value="" class="form-control" placeholder="Pekerjaan">
                                </div>


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
                                        <button type="submit" class="btn btn-primary" value="">Get Started!</button>
                                    </div>
                                </div>


                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>
    <script>
        var loaderElement = document.querySelector('#load_screen');
        setTimeout(function() {
            loaderElement.style.display = "none";
        }, 3000);
    </script>
</body>

</html>