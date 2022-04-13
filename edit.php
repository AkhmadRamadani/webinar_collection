<?php
include 'config/connection.php';
// menyimpan data kedalam variabel
    $userid = $_POST['USER_ID'];
    $judul = $_POST['JUDUL_WEBINAR'];
    $deskripsi = $_POST['DESKRIPSI_WEBINAR'];
    $waktu = ($_POST['WAKTU_WEBINAR']);
    $kapasitas = ($_POST['MAKS_KAPASITAS']);
    $link = ($_POST['LINK_MEETING']);
    $cover = ($_POST['COVER_WEBINAR']);
// query SQL untuk insert data
$query="UPDATE webinar SET  (WEBINAR_ID, USER_ID, JUDUL_WEBINAR, DESKRIPSI_WEBINAR, WAKTU_WEBINAR, MAKS_KAPASITAS, LINK_MEETING, COVER_WEBINAR,LOOKED)
VALUES ('', '$userid', '$judul', '$deskripsi','$waktu', '$kapasitas', '$link', '$cover', '1')";
mysqli_query($connect, $sql);
// mengalihkan ke halaman index.php
header("location:mentorcreate.php");
?>