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
                        <div class="image-wrapper">
                            <img src="<?php echo $fetcheddata['COVER_WEBINAR'] === null ? "styles/assets/img/400x300.jpg" : $fetcheddata['COVER_WEBINAR']; ?>" style="width: 550px; height: auto;" alt>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h6 class=""><?php echo date("l, F jS, Y, g:i a", strtotime($fetcheddata['WAKTU_WEBINAR'])) ?></h6>
                        <h3 class=""><?php echo $fetcheddata['JUDUL_WEBINAR']; ?></h3>
                        <p class=""><?php echo $fetcheddata['DESKRIPSI_WEBINAR']; ?></p>
                        <br><br><br><br><br><br><br><br><br>
                        <div class="image-wrapper avatar mt-2 mb-4">
                            <div class="avatar avatar-sm">
                                <span class="avatar-title rounded-circle"><?php //echo substr(preg_replace('/\b(\w)|./', '$1', $fetcheddata['NAMA']), 0, 2); ?></span>
                            </div>
                            <img alt="avatar" src="styles/assets/img/90x90.jpg" class="rounded-circle" style="width: 50px; height: 50px;" />&nbsp;&nbsp;&nbsp;<?php echo $fetcheddata['NAMA']; ?>
                        </div>
                        <div class="meta-info">
                            <div class="meta-user">
                                <div class="avatar avatar-sm">
                                    <span class="avatar-title rounded-circle"><?php echo substr(preg_replace('/\b(\w)|./', '$1', $fetcheddata['NAMA']), 0, 2); ?></span>
                                </div>
                                <div class="user-name"><?php echo $fetcheddata['NAMA']; ?></div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block mb-4 mr-2">Daftar</button>
                        <a href="javascript:void(0);" class="btn btn-success btn-block mb-4 mr-2">Join Webinar Live</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>