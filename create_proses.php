<?php
session_start();
include "config/connection.php";
        $webid = $_POST['WEBINAR_ID'];
        $userid = $_POST['USER_ID'];
        $judul = $_POST['JUDUL_WEBINAR'];
        $deskripsi = $_POST['DESKRIPSI_WEBINAR'];
        $waktu = ($_POST['WAKTU_WEBINAR']);
        $kapasitas = ($_POST['MAKS_KAPASITAS']);
        $link = ($_POST['LINK_MEETING']);
        $cover = ($_POST['COVER_WEBINAR']);
            
            $sql = "INSERT INTO webinar(WEBINAR_ID, USER_ID, JUDUL_WEBINAR, DESKRIPSI_WEBINAR, WAKTU_WEBINAR, MAKS_KAPASITAS, LINK_MEETING, COVER_WEBINAR,LOOKED)
                    VALUES ('$webid', '$userid', '$judul', '$deskripsi','$waktu', '$kapasitas', '$link', '$cover', '1')";
            //   $result = mysqli_query($connect, $sql);
            if (mysqli_query($connect, $sql)) {
                  echo "<script>alert('Selamat, registrasi berhasil!');
                  document.location.href = 'index.php';</script>";
            } else {
                  echo "<script>alert('Woops! Terjadi kesalahan.');
                  document.location.href = 'mentorcreate.php';</script>";
            }
?>