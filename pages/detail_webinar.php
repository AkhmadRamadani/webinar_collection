<?php
include './config/connection.php';

$id_webinar = $_GET['id'];
$query = "SELECT w.*, wk.*, k.*, u.*, COUNT(l.ID_LIKE) LIKE_COUNT  
    FROM webinar w
    LEFT JOIN webinar_kategori wk 
     ON wk.WEBINAR_ID = w.WEBINAR_ID 
    LEFT JOIN kategori k 
     ON wk.KATEGORI_ID = k.KATEGORI_ID 
    INNER JOIN user u
     ON w.USER_ID = u.USER_ID
    LEFT JOIN like_webinar l
     ON w.WEBINAR_ID = l.WEBINAR_ID
     GROUP BY w.WEBINAR_ID
     HAVING w.WEBINAR_ID = $id_webinar;";
$data = mysqli_query($connect, $query);
$fetcheddata = mysqli_fetch_assoc($data);
?>
<div id="content">
    <div id="basic" class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="image-wrapper mb-2" style="background: #888ea8; text-align: center;">
                            <img src="<?php echo $fetcheddata['COVER_WEBINAR'] === null ? "styles/assets/img/400x300.jpg" : $fetcheddata['COVER_WEBINAR']; ?>" style="height: 500px; max-width: 100%; object-fit: cover;" alt>
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
                            <div class="mt-1 mb-1" style="width: 550px; height: 20px;"><h6 class=""><?php echo date("l, F jS, Y, g:i a", strtotime($fetcheddata['WAKTU_WEBINAR'])) ?></h6></div>
                            <div class="mt-1 mb-1" style="width: 550px; height: 50px;"><h3 class=""><?php echo $fetcheddata['JUDUL_WEBINAR']; ?></h3></div>
                            <div class="mt-1 mb-1" style="width: 550px; height: 280px;"><p class=""><?php echo $fetcheddata['DESKRIPSI_WEBINAR']; ?></p></div>
                            <div class="image-wrapper avatar mt-2 mb-4" style="width: 550px; height: 50px;">
                                <img alt="avatar" src="styles/assets/img/90x90.jpg" class="rounded-circle" style="width: 50px; height: 50px;"/>&nbsp;&nbsp;&nbsp;<?php echo $fetcheddata['NAMA']; ?>
                            </div>
                            <button class="btn btn-primary btn-block mb-4 mr-2">Daftar</button>
                            <a href="javascript:void(0);" class="btn btn-success btn-block mb-4 mr-2">Join Webinar Live</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>