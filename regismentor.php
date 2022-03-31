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
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="pendidikan" name="pendidikan" type="text" value="" class="form-control" placeholder="Pendidikan">
                                </div>

                                <div id="pekerjaan-field" class="field-wrapper input">
                                    <label for="pekerjaan">PEKERJAAN</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="pekerjaan" name="pekerjaan" type="text" value="" class="form-control" placeholder="Pekerjaan">
                                </div>

                                <div id="fotoprofile-field" class="field-wrapper input">
                                    <label for="fotoprofile">FOTO PROFILE</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="fotoprofile" name="fotoprofile" type="text" value="" class="form-control" placeholder="Foto Profile">
                                </div>

                                <div id="buktiijazah-field" class="field-wrapper input">
                                    <label for="buktiijazah">BUKTI IJAZAH</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="buktiijazah" name="buktiijazah" type="text" value="" class="form-control" placeholder="Bukti Ijazah">
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
        setTimeout( function() {
            loaderElement.style.display = "none";
        }, 3000);
    </script>
</body>
</html>