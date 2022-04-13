<?php
    //mengambil data gambar dan menyimpannya kedalam variabel
    include "config/connection..php";
    $nama_file = $_FILES['cover'];

    $path = "media/webinar_cover/".$nama_file;

    $sql = mysqli_query($mysqli,"insert into webinar set cover='$nama_file'");
        //jika insert data berhasil, maka akan dikembalikan ke halaman mentorcreate.php
        if($sql){ 
            echo "cover berhasil disimpan ke database.";
            header("location:'mentorcreate.php'"); 
        }else{
            //jika gagal insert data ke database maka akan memunculkan pesan seperti di bawah ini
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            //link menuju halaman insert gambar
            echo "<br><a href='mentorcreate.php'>Kembali Ke Form</a>";
        }
?>