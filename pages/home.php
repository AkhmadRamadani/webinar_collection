<?php
include './config/connection.php';
$query = "SELECT w.*, wk.*, k.*, u.*, d.*, COUNT(l.ID_LIKE) LIKE_COUNT  
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
 JOIN acc_webinar aw ON aw.WEBINAR_ID = w.WEBINAR_ID WHERE aw.STATUS_PROPOSAL = 1 
 GROUP BY w.WEBINAR_ID
ORDER BY w.LOOKED DESC;";

$currentdate = date("Y-m-d");

$query_latest = "SELECT w.*, wk.*, k.*, u.*,d.*, COUNT(l.ID_LIKE) LIKE_COUNT  
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
 JOIN acc_webinar aw ON aw.WEBINAR_ID = w.WEBINAR_ID WHERE aw.STATUS_PROPOSAL = 1 
 GROUP BY w.WEBINAR_ID
 HAVING w.WAKTU_WEBINAR > '$currentdate'
ORDER BY w.WAKTU_WEBINAR DESC LIMIT 3;";
$fetcheddata = mysqli_query($connect, $query);
$fetcheddatalatest = mysqli_query($connect, $query_latest);

?>
<div class="layout-px-spacing">

    <?php
    if (mysqli_num_rows($fetcheddatalatest) >= 1) {
    ?> <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-5 p-0">
                    <div id="style1" class="carousel slide style-custom-1" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#style1" data-slide-to="0" class="active"></li>
                            <li data-target="#style1" data-slide-to="1"></li>
                            <li data-target="#style1" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                            $i = 0;
                            while (($data_latest = mysqli_fetch_array($fetcheddatalatest))  && $i <= 2) {

                            ?>

                                <div class="carousel-item <?php echo $i == 0 ? "active" : ""; ?>">

                                    <div class="container-fluid" style="height: 360px; z-index: 2; position: absolute; background-color: rgba(0,0,0,0.5);">

                                    </div>
                                    <img class="d-block w-100 slide-image" style="height: 360px; object-fit: cover;" src="<?php echo $data_latest["COVER_WEBINAR"]; ?>" alt="">
                                    <a href="?page=detail&id=<?php echo $data_latest['WEBINAR_ID']; ?>">

                                        <div class="carousel-caption">
                                            <span class="badge"><?php echo $data_latest["NAMA_KATEGORI"] ?></span>
                                            <h3><?php echo $data_latest["JUDUL_WEBINAR"] ?></h3>
                                            <div class="media">
                                                <img src="<?php echo $data_latest["FOTO_PROFILE"] ?>" class="" alt="avatar" style="object-fit: cover;">
                                                <div class="media-body">
                                                    <h6 class="user-name"><?php echo $data_latest["NAMA"] ?></h6>
                                                    <p class="meta-time"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                                        </svg> <?php echo date("l, F jS, Y, g:i a", strtotime($data_latest['WAKTU_WEBINAR'])) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                                $i++;
                            } ?>
                        </div>
                        <a class="carousel-control-prev" href="#style1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#style1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>



    <section class="section">
        <div class="page-header px-4">
            <div class="page-title">
                <h3>Trending Webinar</h3>
            </div>

            <div class="bg-primary rounded-circle p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </div>

        </div>

        <div class="container-fluid">
            <div class="port portfolio-masonry mt-4">

                <div class="portfolioContainer row photo">
                    <?php
                    while ($data = mysqli_fetch_array($fetcheddata)) {

                    ?>
                        <a href="?page=detail&id=<?php echo $data['WEBINAR_ID']; ?>">
                            <div class="col-lg-4 p-4 ">
                                <div class="item-box">
                                    <div class="card component-card_9">
                                        <img src="<?php echo $data['COVER_WEBINAR'] === null ? "styles/assets/img/400x300.jpg" : $data['COVER_WEBINAR']; ?>" class="card-img-top img-thumbnail" style="height: 400px; max-width: 100%; object-fit: cover;" alt="widget-card-2">
                                        <div class="card-body">
                                            <p class="meta-date"><?php echo date("l, F jS, Y, g:i a", strtotime($data['WAKTU_WEBINAR'])) ?></p>

                                            <h5 class="card-title"><?php echo $data['JUDUL_WEBINAR']; ?></h5>
                                            <p class="card-text"><?php echo substr($data['DESKRIPSI_WEBINAR'], 0, 25) . '...'; ?></p>

                                            <div class="meta-info">
                                                <div class="meta-user">
                                                    <div class="avatar avatar-sm">
                                                        <img src="<?php echo $data['FOTO_PROFILE'];?>" class="" alt="avatar" style="height: 39px; width: 39px; border-radius: 100%; object-fit: cover;" >
                                                    </div>
                                                    <div class="user-name"><?php echo $data['NAMA']; ?></div>
                                                </div>

                                                <div class="meta-action">
                                                    <div class="meta-likes">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg> <?php echo $data['LIKE_COUNT']; ?>
                                                    </div>

                                                    <div class="meta-view">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg> <?php echo $data['LOOKED']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>

    <div class="footer-wrapper">

    </div>

</div>