<?php
include './config/connection.php';
$query = "SELECT w.*, u.NAMA, u.EMAIL, COUNT(l.ID_LIKE) LIKE_COUNT 
FROM webinar w JOIN user u ON w.USER_ID = u.USER_ID 
LEFT JOIN like_webinar l ON w.WEBINAR_ID = l.WEBINAR_ID 
GROUP BY w.WEBINAR_ID
ORDER BY w.LOOKED DESC;";
$fetcheddata = mysqli_query($connect, $query);
$akun = $_SESSION['user'];
?>
<div class="layout-px-spacing">
    <div class="row mb-4 mt-3">
        <div class="col-sm-3 col-12">
            <div class="nav flex-column nav-pills mb-sm-0 mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active mb-2" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Coming Soon</a>
                <a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">On Progress</a>
                <a class="nav-link mb-2" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Finished</a>
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
                                        <div class="col-lg-5">
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
                                                                    <span class="avatar-title rounded-circle"><?php echo substr(preg_replace('/\b(\w)|./', '$1', $data['NAMA']), 0, 2); ?></span>
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
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <p class="dropcap  dc-outline-primary">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <blockquote class="blockquote">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    </blockquote>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-wrapper">

    </div>

</div>