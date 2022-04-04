<?php
include './config/connection.php';
$query = "SELECT w.*, u.NAMA, u.EMAIL, COUNT(l.ID_LIKE) LIKE_COUNT 
FROM webinar w JOIN user u ON w.USER_ID = u.USER_ID 
LEFT JOIN like_webinar l ON w.WEBINAR_ID = l.WEBINAR_ID ORDER BY w.LOOKED DESC;";
$fetcheddata = mysqli_query($connect, $query);

?>
<div class="layout-px-spacing">

    <div class="page-header">
        <div class="page-title">
            <h3>Trending Webinar</h3>
        </div>

        <div class="bg-secondary rounded-circle p-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </div>

    </div>

    <section class="section">
        <div class="container-fluid">
            <div class="port portfolio-masonry mt-4">

                <div class="portfolioContainer row photo">
                    <?php
                    while ($data = mysqli_fetch_array($fetcheddata)) {

                    ?>
                        <div class="col-lg-4 p-4 ">
                            <div class="item-box">
                                <div class="card component-card_9">
                                    <img src="<?php echo $data['COVER_WEBINAR'] === null ? "styles/assets/img/400x300.jpg" : $data['COVER_WEBINAR']; ?>" class="card-img-top img-thumbnail" alt="widget-card-2">
                                    <div class="card-body">
                                        <p class="meta-date"><?php echo date("l, F jS, Y, g:i a", strtotime($data['WAKTU_WEBINAR'])) ?></p>

                                        <h5 class="card-title"><?php echo $data['JUDUL_WEBINAR']; ?></h5>
                                        <p class="card-text"><?php echo $data['DESKRIPSI_WEBINAR']; ?></p>

                                        <div class="meta-info">
                                            <div class="meta-user">
                                                <div class="avatar avatar-sm">
                                                    <span class="avatar-title rounded-circle">AR</span>
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