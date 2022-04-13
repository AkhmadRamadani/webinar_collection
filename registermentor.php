<?php
session_start();
include "config/connection.php";

    if (isset($_POST['registermentor'])) {
        $biodata = $_POST['BIODATA'];
        $pendidikan = $_POST['PENDIDIKAN'];
        $pekerjaan = ($_POST['PEKERJAAN']);
        $foto_profile = ($_POST['FOTO_PROFILE']);
        $bukti_ijazah = ($_POST['BUKTI_IJAZAH']);
        $sql = "INSERT INTO user_detail (BIODATA, PENDIDIKAN, PEKERJAAN, FOTO_PROFILE, BUKTI_IJAZAH) 
                VALUES ('$biodata', '$pendidikan','$pekerjaan', '$foto_profile', '$bukti_ijazah')";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            echo "<script>alert('Berikut adalah data mentor!'); </script>";
            $biodata = "";
                    $pendidikan = "";
                    $pekerjaan = "";
                    $foto_profile ="";
                    $bukti_ijazah ="";
            echo "<script>location='registrasi.php';</script>";
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    }

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Webion - Register Mentor</title>
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

                            <h1 class="">Data Mentor</h1>
                            <p class="signup-link register">Already have an account? <a href="registrasi.php">Registrasi Mentor</a></p>
                            
                            <!-- Start Form Register Mentor -->
                            <form class="text-left" method="POST">
                                <div class="form">

                                    <div id="alamat-field" class="field-wrapper input">
                                            <label for="biodata">BIODATA</label>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                            <input id="biodata" name="biodata" type="text" value="" class="form-control" placeholder="Biodata">
                                    </div>

                                    <div id="pendidikan" class="field-wrapper input">
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

                                    <div id="fotoprofile-field" class="field-wrapper input">
                                        <label for="fotoprofile">FOTO PROFILE</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        <input id="fotoprofile" name="fotoprofile" type="text" value="" class="form-control" placeholder="Foto Profile">
                                        <form method="post" enctype="multipart/form-data" action="uploadproses.php">
                                            <Input type="file" name="gambar">
                                            <input type="submit" value="upload">
                                        </form>
                                    </div>

                                    <div id="buktiijazah-field" class="field-wrapper input">
                                        <label for="buktiijazah">BUKTI IJAZAH</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        <input id="buktiijazah" name="buktiijazah" type="text" value="" class="form-control" placeholder="Bukti Ijazah">
                                        <form method="post" enctype="multipart/form-data" action="uploadproses.php">
                                            <Input type="file" name="gambar">
                                            <input type="submit" value="upload">
                                        </form>
                                    </div>

                                    <div class="field-wrapper terms_condition">
                                        <div class="n-chk">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" class="new-control-input">
                                            </label>
                                        </div>

                                    </div>

                                    <div class="d-sm-flex justify-content-between">
                                        <div class="field-wrapper">
                                            <button type="submit" class="btn btn-primary" name="create">Create Account!</button>
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