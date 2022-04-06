<html>
<head>
  <title>Data Gambar</title>
</head>
    <body>
        <h1>Data Gambar</h1><hr>
        //link menuju halaman upload gambar
        <a href="uploadgambar.php">Tambah Gambar</a><br><br>
        //data akan ditampilkan di dalam tabel
        <table border="1" cellpadding="8">
            <tr>
            <th>Gambar</th>
            <th>Nama File</th>
            <th>Ukuran File</th>
            <th>Tipe File</th>
        </tr>
            <?php
            //memanggil file koneksi
            include "koneksi.php";
            //query mengambil data dari tabel gambar di database
            $tampil = mysqli_query($mysqli,"select * from gambar");
            $sql = mysqli_num_rows($tampil);
                while($hasil = mysqli_fetch_array($tampil)){
            ?>
            <tr>
            <td><img width="50" height="50" src="<?php echo "images/".$hasil['nama'];?>"></td>
            <td><?php echo $hasil['nama'];?></td>
            <td><?php echo $hasil['ukuran'];?></td>
            <td><?php echo $hasil['tipe'];?></td>
            </tr>
            <?php
                
                }
            ?>
        </table>
    </body>
</html>