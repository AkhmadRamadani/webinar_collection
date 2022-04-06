<?php
session_start();
include "config/connection.php";
  if (isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
        $biodata = $_POST['biodata'];
        $pendidikan = $_POST['pendidikan'];
        $pekerjaan = ($_POST['pekerjaan']);
        $foto_profile = ($_POST['foto_profile']);
        $bukti_ijazah = ($_POST['bukti_ijazah']);
              if (!$result->num_rows > 0) {
                $sql = "INSERT INTO user_detail(user_id, biodata, pendidikan, pekerjaan,foto_profile, bukti_ijazah)
                        VALUES ('','$biodata', '$pendidikan','$pekerjaan', '$foto_profile', '$bukti_ijazah')";
                $result = mysqli_query($connect, $sql);
                if ($result) {
                    echo "<script>alert('Berikut adalah data mentor!')</script>";
                    $biodata = "";
                    $pendidikan = "";
                    $pekerjaan = "";
                    $foto_profile ="";
                    $bukti_ijazah ="";
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
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/loader.js"></script>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
        <link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="styles/assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="styles/assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
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

                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Get Started!</button>
                                    </div>
                                </div>

                                <div class="division">
                                    <span>OR</span>
                                </div>

                                <div class="social">
                                    <a href="javascript:void(0);" class="btn social-fb">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                        <span class="brand-name">Facebook</span>
                                    </a>
                                    <a href="javascript:void(0);" class="btn social-github">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                                        <span class="brand-name">Github</span>
                                    </a>
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