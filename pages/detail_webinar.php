<?php
include './config/connection.php';

$id_webinar = $_GET['id'];

@$akun = $_SESSION['user'];
@$id_user = $akun['USER_ID'];

$query = "	SELECT * FROM 
(SELECT w.*, wk.KATEGORI_ID, k.NAMA_KATEGORI, u.NAMA, d.FOTO_PROFILE, COUNT(l.ID_LIKE) LIKE_COUNT  
FROM webinar w
LEFT JOIN webinar_kategori wk 
 ON wk.WEBINAR_ID = w.WEBINAR_ID 
LEFT JOIN kategori k 
 ON wk.KATEGORI_ID = k.KATEGORI_ID 
INNER JOIN user u
 ON w.USER_ID = u.USER_ID
INNER JOIN user_detail d
 ON d.USER_ID = u.USER_ID
LEFT JOIN like_webinar l
 ON w.WEBINAR_ID = l.WEBINAR_ID
 GROUP BY w.WEBINAR_ID
 HAVING w.WEBINAR_ID = '$id_webinar') as t1 LEFT JOIN
 (
     SELECT wr.WEBINAR_ID as WEBINAR_REGIST_ID, ur.NAMA as GUEST_NAME, ur.USER_ID as GUEST_ID FROM 
     user ur 
     LEFT JOIN webinar_regist wr 
     ON ur.USER_ID = wr.USER_ID
     WHERE wr.WEBINAR_ID = '$id_webinar' AND wr.USER_ID = '$id_user'
 ) as t2 ON t1.WEBINAR_ID = t2.WEBINAR_REGIST_ID LEFT JOIN 
     (
         SELECT webinar_regist.WEBINAR_ID as WEBINAR_COUNT_ID,
         COUNT(webinar_regist.WEBINAR_ID) as PARTICIPANTS_JOINNED 
         FROM webinar_regist WHERE webinar_regist.WEBINAR_ID = '$id_webinar'
     ) as t3 ON t1.WEBINAR_ID = t3.WEBINAR_COUNT_ID
";
// echo $query;
$data = mysqli_query($connect, $query);
$fetcheddata = mysqli_fetch_assoc($data);

//seen data
$update_looked = "UPDATE webinar SET LOOKED=LOOKED+1 WHERE WEBINAR_ID = '$id_webinar'";
$data_looked = mysqli_query($connect, $update_looked);
?>
<div id="content">

    <div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="daftarModalLabel">Join Webinar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-vertical" enctype="multipart/form-data" action="" method="POST">
                    <div class="modal-body">
                        <p>Are you sure you want to join this <b><?php echo $fetcheddata['JUDUL_WEBINAR']; ?></b> webinar?</p>
                    </div>
                    <input type="text" name="join_webinar_id" hidden value="<?php echo $fetcheddata['WEBINAR_ID']; ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Join" name="join_webinar">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="basic" class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="image-wrapper mb-2" style="background:#F1F6F9; text-align: center; border-radius: 15px; /* border: 2px solid #4361ee;*/">
                            <img src="<?php echo $fetcheddata['COVER_WEBINAR'] === null ? "styles/assets/img/400x300.jpg" : $fetcheddata['COVER_WEBINAR']; ?>" style="height: 500px; max-width: 100%; object-fit: cover; border-radius: 15px;" alt>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                </path>
                            </svg>&nbsp;<?php echo $fetcheddata['LIKE_COUNT']; ?>
                            &nbsp;&nbsp;&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                </path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>&nbsp;<?php echo $fetcheddata['LOOKED']; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-1 mb-1" style="width: 550px; height: 20px;">
                            <h6 class=""><?php echo date("l, F jS, Y, g:i a", strtotime($fetcheddata['WAKTU_WEBINAR'])) ?></h6>
                        </div>
                        <div class="mt-1 mb-1" style="width: 550px; height: 50px;">
                            <h3 class=""><?php echo $fetcheddata['JUDUL_WEBINAR']; ?></h3>
                        </div>
                        <div class="mt-1 mb-1" style="width: 550px; height: 280px;">
                            <p class=""><?php echo $fetcheddata['DESKRIPSI_WEBINAR']; ?></p>
                        </div>
                        <div class="image-wrapper avatar mt-2 mb-4" style="width: 550px; height: 50px;">
                        <a href="?page=userseen&id=<?php echo $fetcheddata['USER_ID']; ?>">
                            <img alt="avatar" src="<?php echo $fetcheddata['FOTO_PROFILE'];?>" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;" />&nbsp;&nbsp;&nbsp;<?php echo $fetcheddata['NAMA']; ?>
                        </a>
                        </div>
                        <?php
                        if (isset($akun)) {
                            if ($fetcheddata['GUEST_NAME'] != NULL) {
                        ?>
                                <a href="<?php echo $fetcheddata['LINK_MEETING'] ?>" target="_blank" class="btn btn-success btn-block mb-4 mr-2">Join Webinar Live</a>
                            <?php
                            } else {
                            ?>
                                <button class="btn btn-primary btn-block mb-4 mr-2" type="button" data-toggle="modal" data-target="#daftarModal">Daftar</button>
                            <?php
                            }
                        } else {
                            ?>
                            <a href="login.php" class="btn btn-success btn-block mb-4 mr-2">Daftar</a>

                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

@$id_webinar = $_POST['join_webinar_id'];
@$kirim = $_POST['join_webinar'];
$query = "INSERT INTO `webinar_regist`(`USER_ID`, `WEBINAR_ID`) VALUES ('$id_user', '$id_webinar')";
if ($kirim) {

    $hasil = mysqli_query($connect, $query);
    if ($hasil) {
        echo "<script>location='index.php?page=detail&id=$id_webinar';</script>";
    } else {
        // echo "2";
        // echo $query;
        echo "<script>alert('Gagal menambahkan data'); </script>";
        echo "<script>location='index.php?page=detail&id=$id_webinar';</script>";
    }
}
?>