<?php
session_start();
include "config/connection.php";
if (isset($_SESSION['USER_ID'])) {
    if (isset($_POST['sumbit'])) {
        $userid = $_POST['USER_ID'];
        $judul = $_POST['JUDUL_WEBINAR'];
        $deskripsi = $_POST['DESKRIPSI_WEBINAR'];
        $waktu = ($_POST['WAKTU_WEBINAR']);
        $kapasitas = ($_POST['MAKS_KAPASITAS']);
        $link = ($_POST['LINK_MEETING']);
        $cover = ($_POST['COVER_WEBINAR']);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO webinar (WEBINAR_ID, USER_ID, JUDUL_WEBINAR, DESKRIPSI_WEBINAR, WAKTU_WEBINAR, MAKS_KAPASITAS, LINK_MEETING, COVER_WEBINAR,LOOKED)
                        VALUES ('', '$userid', '$judul', '$deskripsi','$waktu', '$kapasitas', '$link', '$cover', '1')";
                $result = mysqli_query($connect, $sql);
                if ($result) {
                    echo "<script>alert('selamat anda berhasil mendaftarkan webinar!')</script>";
                    $userid = "";
                    $judul = "";
                    $deskripsi = "";
                    $waktu = "";
                    $kapasitas ="";
                    $link ="";
                    $cover ="";
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
    <title>Webion - Mentor Update Webinar</title>
    <link rel="icon" type="image/x-icon" href="styles/assets/img/logo.png"/>
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

                            <h1 class="">Update Webinar</h1>
                            <form action="mentorcreate.php" method="POST" class="text-left">
                                <div class="form">
                                    <div id="userid-field" class="field-wrapper input">
                                        <label for="userid">ID</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        <input id="userid" name="userid" type="text" value="" class="form-control" placeholder="Isi user id..">
                                    </div>

                                    <div id="judul-field" class="field-wrapper input">
                                        <label for="judul">JUDUL</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        <input id="judul" name="judul" type="text" value="" class="form-control" placeholder="Isi Judul Webinar..">
                                    </div>

                                    <div id="deskripsi-field" class="field-wrapper input">
                                        <label for="deskripsi">DESKRIPSI</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        <input id="deskripsi" name="deskripsi" type="text" value="" class="form-control" placeholder="Isi Deskripsi Webinar..">
                                    </div>

                                    <div id="waktu-field" class="field-wrapper input">
                                        <label for="waktu">WAKTU</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        <input id="waktu" name="waktu" type="text" value="" class="form-control" placeholder="Isi Tanggal dan Waktu Webinar..">
                                    </div>

                                    <div id="kapasitas-field" class="field-wrapper input">
                                        <label for="kapasitas">KAPASITAS</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        <input id="kapasitas" name="kapasitas" type="text" value="" class="form-control" placeholder="Isi Kapasitas Webinar..">
                                    </div>

                                    <div id="link-field" class="field-wrapper input">
                                        <label for="link">LINK</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        <input id="link" name="link" type="text" value="" class="form-control" placeholder="Isi Link Webinar..">
                                    </div>

                                    <div id="cover-field" class="field-wrapper input">
                                        <label for="cover">COVER</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        <input id="cover" name="cover" type="text" value="" class="form-control" placeholder="Masukkan Cover Webinar..">
                                        <form method="post" enctype="multipart/form-data" action="uploadcover.php">
                                            <Input type="file" name="cover">
                                        </form>
                                    </div>
                                </div>
                                <tr><td colspan="2"><button type="submit" value="simpan">SIMPAN PERUBAHAN</button>
                                <a href="mentorcreate.php">Kembali</a></td></tr>
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