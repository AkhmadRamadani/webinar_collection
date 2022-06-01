<?php
include './config/connection.php';
$currentdate = date("Y-m-d");
$akun = $_SESSION['user'];
$id_user = $akun['USER_ID'];


// Comingsoon query
$query_comingsoon = "SELECT w.*, u.USER_ID, u.NAMA, u.EMAIL, d.*,COUNT(l.ID_LIKE) LIKE_COUNT FROM webinar w 
JOIN user u ON w.USER_ID = u.USER_ID 
INNER JOIN user_detail d
 ON d.USER_ID = u.USER_ID
LEFT JOIN like_webinar l ON w.WEBINAR_ID = l.WEBINAR_ID 
JOIN webinar_regist wr ON wr.WEBINAR_ID = w.WEBINAR_ID
WHERE w.WAKTU_WEBINAR > '$currentdate'  AND wr.USER_ID ='$id_user'
GROUP BY w.WEBINAR_ID 
ORDER BY w.WEBINAR_ID DESC";
$fetcheddata_comingsoon = mysqli_query($connect, $query_comingsoon);

// echo $query_comingsoon;
// ON PROGRESS QUERY

$query_onprogress = "SELECT w.*, u.USER_ID, u.NAMA, u.EMAIL, d.*,COUNT(l.ID_LIKE) LIKE_COUNT FROM webinar w 
JOIN user u ON w.USER_ID = u.USER_ID 
INNER JOIN user_detail d
 ON d.USER_ID = u.USER_ID
LEFT JOIN like_webinar l ON w.WEBINAR_ID = l.WEBINAR_ID 
JOIN webinar_regist wr ON wr.WEBINAR_ID = w.WEBINAR_ID
WHERE  w.WAKTU_WEBINAR = '$currentdate' AND wr.USER_ID ='$id_user'
GROUP BY w.WEBINAR_ID 
ORDER BY w.WEBINAR_ID DESC";
$fetcheddata_onprogress = mysqli_query($connect, $query_onprogress);


// FINISHED QUERY

$query_finished = "SELECT w.*, u.USER_ID, u.NAMA, u.EMAIL, d.*,COUNT(l.ID_LIKE) LIKE_COUNT FROM webinar w 
JOIN user u ON w.USER_ID = u.USER_ID 
INNER JOIN user_detail d
 ON d.USER_ID = u.USER_ID
LEFT JOIN like_webinar l ON w.WEBINAR_ID = l.WEBINAR_ID 
JOIN webinar_regist wr ON wr.WEBINAR_ID = w.WEBINAR_ID
WHERE w.WAKTU_WEBINAR < '$currentdate'  AND wr.USER_ID ='$id_user'
GROUP BY w.WEBINAR_ID 
ORDER BY w.WEBINAR_ID DESC";
$fetcheddata_finished = mysqli_query($connect, $query_finished);

// $fetcheddatab = mysqli_query($connect, $query);
?>
<div class="layout-px-spacing">
    <div class="row mb-4 mt-3">
        <div class="col-sm-3 col-12">
            <div class="nav flex-column nav-pills mb-sm-0 mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active mb-2" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Coming Soon</a>
                <a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile">Today's Webinar</a>
                <a class="nav-link mb-2" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages">Finished</a>
            </div>
        </div>

        <div class="col-sm-9 col-12">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <section class="section">
                        <div class="page-header px-4">
                            <div class="page-title">
                                <h3>Coming Soon</h3>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="port portfolio-masonry mt-4">

                                <div class="portfolioContainer row photo">
                                    <?php
                                    while ($data = mysqli_fetch_array($fetcheddata_comingsoon)) {

                                    ?>
                                        <div class="col-lg-5">
                                            <div class="item-box">
                                                <a href="?page=detail&id=<?php echo $data['WEBINAR_ID']; ?>">
                                                    <div class="card component-card_9">
                                                        <img src="<?php echo $data['COVER_WEBINAR'] === null ? "styles/assets/img/400x300.jpg" : $data['COVER_WEBINAR']; ?>" class="card-img-top img-thumbnail" alt="widget-card-2">
                                                        <div class="card-body">
                                                            <p class="meta-date"><?php echo date("l, F jS, Y, g:i a", strtotime($data['WAKTU_WEBINAR'])) ?></p>

                                                            <h5 class="card-title"><?php echo $data['JUDUL_WEBINAR']; ?></h5>
                                                            <p class="card-text"><?php echo $data['DESKRIPSI_WEBINAR']; ?></p>

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
                                                </a>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <section class="section">
                        <div class="page-header px-4">
                            <div class="page-title">
                                <h3>Finished</h3>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="port portfolio-masonry mt-4">

                                <div class="portfolioContainer row photo">
                                    <?php
                                    while ($data_finished = mysqli_fetch_array($fetcheddata_finished)) {

                                    ?>
                                        <div class="col-lg-5">
                                            <div class="item-box">
                                                <div class="card component-card_9">
                                                    <img src="<?php echo $data_finished['COVER_WEBINAR'] === null ? "styles/assets/img/400x300.jpg" : $data_finished['COVER_WEBINAR']; ?>" class="card-img-top img-thumbnail" alt="widget-card-2">
                                                    <div class="card-body">
                                                        <p class="meta-date"><?php echo date("l, F jS, Y, g:i a", strtotime($data_finished['WAKTU_WEBINAR'])) ?></p>

                                                        <h5 class="card-title"><?php echo $data_finished['JUDUL_WEBINAR']; ?></h5>
                                                        <p class="card-text"><?php echo $data_finished['DESKRIPSI_WEBINAR']; ?></p>

                                                        <div class="meta-info">
                                                            <div class="meta-user">
                                                                <div class="avatar avatar-sm">
                                                                <img src="<?php echo $data_finished['FOTO_PROFILE'];?>" class="" alt="avatar" style="height: 39px; width: 39px; border-radius: 100%; object-fit: cover;" >
                                                                </div>
                                                                <div class="user-name"><?php echo $data_finished['NAMA']; ?></div>
                                                            </div>

                                                            <div class="meta-action">
                                                                <div class="meta-likes">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                                        </path>
                                                                    </svg> <?php echo $data_finished['LIKE_COUNT']; ?>
                                                                </div>

                                                                <div class="meta-view">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                        </path>
                                                                        <circle cx="12" cy="12" r="3"></circle>
                                                                    </svg> <?php echo $data_finished['LOOKED']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <section class="section">
                        <div class="page-header px-4">
                            <div class="page-title">
                                <h3>Today's Webinar</h3>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="port portfolio-masonry mt-4">

                                <div class="portfolioContainer row photo">
                                    <?php
                                    while ($data_onprogress = mysqli_fetch_array($fetcheddata_onprogress)) {

                                    ?>
                                        <div class="col-lg-5">
                                            <div class="item-box">
                                                <a href="?page=detail&id=<?php echo $data['WEBINAR_ID']; ?>">
                                                    <div class="card component-card_9">
                                                        <img src="<?php echo $data_onprogress['COVER_WEBINAR'] === null ? "styles/assets/img/400x300.jpg" : $data_onprogress['COVER_WEBINAR']; ?>" class="card-img-top img-thumbnail" alt="widget-card-2">
                                                        <div class="card-body">
                                                            <p class="meta-date"><?php echo date("l, F jS, Y, g:i a", strtotime($data_onprogress['WAKTU_WEBINAR'])) ?></p>

                                                            <h5 class="card-title"><?php echo $data_onprogress['JUDUL_WEBINAR']; ?></h5>
                                                            <p class="card-text"><?php echo $data_onprogress['DESKRIPSI_WEBINAR']; ?></p>

                                                            <div class="meta-info">
                                                                <div class="meta-user">
                                                                    <div class="avatar avatar-sm">
                                                                    <img src="<?php echo $data_onprogress['FOTO_PROFILE'];?>" class="" alt="avatar" style="height: 39px; width: 39px; border-radius: 100%; object-fit: cover;" >
                                                                    </div>
                                                                    <div class="user-name"><?php echo $data_onprogress['NAMA']; ?></div>
                                                                </div>

                                                                <div class="meta-action">
                                                                    <div class="meta-likes">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                                            </path>
                                                                        </svg> <?php echo $data_onprogress['LIKE_COUNT']; ?>
                                                                    </div>

                                                                    <div class="meta-view">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                            </path>
                                                                            <circle cx="12" cy="12" r="3"></circle>
                                                                        </svg> <?php echo $data_onprogress['LOOKED']; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-wrapper">

    </div>

</div>