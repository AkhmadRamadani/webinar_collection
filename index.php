<!DOCTYPE html>
<html lang="en">

<head>
    <title>Webinar Collection</title>
    <link rel="icon" type="image/x-icon" href="styles/assets/img/logo.png" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link href="styles/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="styles/assets/js/loader.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="styles/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="styles/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />

    <link href="styles/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/components/custom-carousel.css" rel="stylesheet" type="text/css">
    <link href="styles/assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css">
    <link href="styles/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/assets/css/elements/alert.css">
    <link rel="stylesheet" type="text/css" href="styles/plugins/bootstrap-select/bootstrap-select.min.css">

    <link href="styles/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />

    <?php
    session_start();
    // error_reporting(0);
    include './config/connection.php';

    $page = $_GET['page'];
    ?>


</head>

<body class="alt-menu sidebar-noneoverflow">

    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ajukanMentorModal" tabindex="-1" role="dialog" aria-labelledby="ajukanMentorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajukanMentorModalLabel">Ajukan Mentor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-vertical" enctype="multipart/form-data" action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group mb-4">
                            <label class="control-label">Biodata Singkat:</label>
                            <textarea type="text" name="biodata" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Pendidikan Terakhir:</label>
                            <input type="text" name="last_degree" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Pekerjaan Saat Ini:</label>
                            <input type="text" name="occupation" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Bukti Ijazah Terakhir:</label>

                            <div class="input-group mb-3">

                                <div class="custom-file">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">

                                    <input type="file" class="form-control" name="bukti_ijazah">

                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Foto Profil:</label>

                            <div class="input-group mb-3">

                                <div class="custom-file">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">

                                    <input type="file" class="form-control" name="foto_profil">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save" name="kirim">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pengajuanMentorUpdate" tabindex="-1" role="dialog" aria-labelledby="pengajuanMentorUpdateLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pengajuanMentorUpdateLabel">Pengajuan Mentor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                if (isset($_SESSION["user"])) {
                    $akun = $_SESSION["user"];
                    $userid = $akun["USER_ID"];
                }
                $query_get_data = "SELECT u.*, ud.BIODATA, 
                    ud.PENDIDIKAN, ud.PEKERJAAN, 
                    ud.FOTO_PROFILE, ud.BUKTI_IJAZAH,
                    am.MESSAGE, am.STATUS_PROPOSAL 
                    FROM user u 
                    LEFT JOIN user_detail ud 
                    ON u.USER_ID = ud.USER_ID
                    LEFT JOIN acc_mentor am 
                    ON u.USER_ID = am.USER_ID WHERE u.USER_ID = '$userid'";
                // echo $query_get_data;
                $execgetdata = mysqli_query($connect, $query_get_data);
                $row = mysqli_fetch_assoc($execgetdata);
                ?>
                <form class="form-vertical" enctype="multipart/form-data" action="" method="POST">
                    <div class="modal-body">
                        <?php
                        if ($row['STATUS_PROPOSAL'] == 0) {
                        ?>
                            <div class="alert alert-primary mb-4" role="alert">
                                <strong>Maaf!</strong> Data sedang diverifikasi. Silakan tunggu
                            </div>
                        <?php
                        } else if ($row['STATUS_PROPOSAL'] == 1) {
                        ?>
                            <div class="alert alert-success mb-4" role="alert">
                                <strong>Selamat!</strong> Data Anda telah diverifikasi dan diterima oleh Admin. <br>
                                Silakan login kembali untuk menjadi mentor!!!
                            </div>
                        <?php
                        } else if ($row['STATUS_PROPOSAL'] == 2) {
                        ?>
                            <div class="alert alert-danger mb-4" role="alert">
                                <strong>Maaf!</strong> Silakan perbaiki data Anda.<br>
                                Message:
                                <?php echo $row['MESSAGE']; ?>
                            </div>
                        <?php
                        }

                        if ($row['STATUS_PROPOSAL'] == 2 || $row['STATUS_PROPOSAL'] == 0) {
                        ?>

                            <div class="form-group mb-4">
                                <label class="control-label">Biodata Singkat:</label>
                                <textarea type="text" name="biodata_update" class="form-control"><?php echo $row['BIODATA']; ?></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label class="control-label">Pendidikan Terakhir:</label>
                                <input type="text" name="last_degree_update" class="form-control" value="<?php echo $row['PENDIDIKAN']; ?>">
                            </div>
                            <div class="form-group mb-4">
                                <label class="control-label">Pekerjaan Saat Ini:</label>
                                <input type="text" name="occupation_update" class="form-control" value="<?php echo $row['PEKERJAAN']; ?>">
                            </div>
                            <div class="form-group mb-4">
                                <label class="control-label">Bukti Ijazah Terakhir:</label>

                                <div class="input-group mb-3">

                                    <div class="custom-file">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000">

                                        <input type="file" class="form-control" name="bukti_ijazah_update">

                                    </div>
                                </div>
                            </div>
                            <div class="text-center user-info">
                                <img src="<?php echo $row['BUKTI_IJAZAH'] === null ? "styles/assets/img/90x90.jpg" : $row['BUKTI_IJAZAH']; ?>" alt="avatar" style="width: 200px">
                            </div>
                            <input type="text" name="bukti_ijazah_update_setted" value="<?php echo $row['BUKTI_IJAZAH'] ?>" hidden>
                            <input type="text" name="foto_profil_update_setted" value="<?php echo $row['FOTO_PROFILE'] ?>" hidden>
                            <div class="form-group mb-4">
                                <label class="control-label">Foto Profil:</label>

                                <div class="input-group mb-3">

                                    <div class="custom-file">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000">

                                        <input type="file" class="form-control" name="foto_profil_update">

                                    </div>
                                </div>
                            </div>
                            <div class="text-center user-info">
                                <img src="<?php echo $row['FOTO_PROFILE'] === null ? "styles/assets/img/90x90.jpg" : $row['FOTO_PROFILE']; ?>" alt="avatar" style="width: 200px">
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="modal-footer">
                        <?php
                        if ($row['STATUS_PROPOSAL'] == 0) {
                        ?>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <?php
                        } else if ($row['STATUS_PROPOSAL'] == 2) {
                        ?>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Update" name="update">
                        <?php
                        } else if ($row['STATUS_PROPOSAL'] == 1) {
                        ?>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Logout" name="logout">
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            </a>
            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="index.php"><img alt="logo" src="styles/assets/img/webion.png"> <span class="navbar-brand-name">WEBION</span></a>
            </div>
            <ul class="navbar-item topbar-navigation">
                <!-- START TOPBAR -->
                <div class="topbar-nav header navbar" role="banner">
                    <nav id="topbar">
                        <ul class="navbar-nav theme-brand flex-row  text-center">
                            <li class="nav-item theme-logo">
                                <a href="index.php">
                                    <img src="styles/assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                                </a>
                            </li>
                            <li class="nav-item theme-text">
                                <a href="index.php" class="nav-link"> WEBION </a>
                            </li>
                        </ul>
                        <ul class="list-unstyled menu-categories" id="topAccordion">
                            <li class="menu single-menu <?php echo isset($_GET['page']) ? '' : 'active' ?> ">
                                <a href="index.php" class="dropdown-toggle autodroprown">
                                    <div class="">
                                        <span>Dashboard</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </a>
                            </li>
                            <li class="menu single-menu <?php echo $page === 'kategori' ? 'active' : '' ?> ">
                                <a href="index.php?page=kategori" class="dropdown-toggle">
                                    <div class="">
                                        <span>Category</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </a>
                            </li>
                            <?php
                            if (isset($_SESSION["user"])) {

                                $akun = $_SESSION["user"];
                                if ($akun['ROLE'] == 1 || $akun['ROLE'] == 2) {
                            ?>
                                    <li class="menu single-menu <?php echo $page === 'eventku' ? 'active' : '' ?> ">
                                        <a href="index.php?page=eventku" class="dropdown-toggle">
                                            <div class="">
                                                <span>My Events</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </a>
                                    </li>
                                <?php
                                }
                                if ($akun['ROLE'] == 2) {
                                ?>
                                    <li class="menu single-menu <?php echo $page === 'webinarku' ? 'active' : '' ?> ">
                                        <a href="index.php?page=webinarku" class="dropdown-toggle">
                                            <div class="">
                                                <span>My Webinars</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </a>
                                    </li>
                                <?php
                                }
                                if ($akun['ROLE'] == 3) {
                                ?>
                                    <li class="menu single-menu <?php echo $page === 'mentor' ? 'active' : '' ?> ">
                                        <a href="index.php?page=mentor" class="dropdown-toggle">
                                            <div class="">
                                                <span>Mentor</span>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                                <polyline points="6 9 12 15 18 9"></polyline>
                                            </svg>
                                        </a>
                                    </li>
                            <?php
                                }
                            }

                            ?>

                            <li class="menu single-menu menu-extras">
                                <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg> <span class="d-xl-none">More</span></span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </a>
                                <ul class="collapse submenu list-unstyled animated fadeInUp" id="more" data-parent="#topAccordion">
                                    <?php
                                    if (isset($_SESSION["user"])) {

                                        $akun = $_SESSION["user"];
                                        if ($akun['ROLE'] == 1) {
                                            if ($akun['STATUS_PROPOSAL'] != null) {
                                    ?>

                                                <li>
                                                    <a href="" data-toggle="modal" data-target="#pengajuanMentorUpdate"> Lihat Pengajuan Mentor </a>
                                                </li>
                                            <?php
                                            } else {
                                            ?>
                                                <li>
                                                    <a href="" data-toggle="modal" data-target="#ajukanMentorModal"> Ajukan Mentor </a>
                                                </li>
                                        <?php
                                            }
                                        }
                                    } else {
                                        ?>


                                        <li>
                                            <a href="registrasi.php"> Register </a>
                                        </li>
                                        <li>
                                            <a href="login.php"> Login </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                    <li>
                                        <a href="FAQ.php"> FAQ </a>
                                    </li>
                                    <li>
                                        <a href="AboutUs.php"> About Us </a>
                                    </li>
                                    <li>
                                        <a href="ContactUs.php"> Contact Us </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--  END TOPBAR  -->
            </ul>
            <!-- Search -->
            <ul class="navbar-item flex-row ml-auto">
                <li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <form class="form-inline search-full form-inline search" role="search" method="post" action="index.php?page=cari">
                        <div class="search-bar">
                            <input type="text" id="keyword" name="keyword" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                    </form>
                </li>
            </ul>
            <!-- Search -->
            <?php
            if (isset($_SESSION["user"])) {

            ?>

                <!-- Notification -->
                <ul class="navbar-item flex-row nav-dropdowns">
                    <li class="nav-item dropdown notification-dropdown">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <!-- Green Alert -->
                            <!-- <span class="badge badge-success"></span> -->
                        </a>
                        <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                            <div class="notification-scroll">
                                <div class="dropdown-item">
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="data-info">
                                                <h6 class="">You don't have notification</h6>
                                                <p class="">...</p>
                                            </div>
                                            <!-- x -->
                                            <div class="icon-status">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </div>
                                            <!-- v -->
                                            <!-- 
                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Start Profile -->
                    <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media">
                                <img src="styles/assets/img/user.png" class="img-fluid" alt="admin-profile">
                            </div>
                        </a>
                        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                            <div class="user-profile-section">
                                <div class="media mx-auto">
                                    <div class="media-body">
                                        <h5><?php echo $akun['NAMA'] ?></h5>
                                        <!-- <p>user</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-item">
                            <?php
                                $akun = $_SESSION["user"];
                                if ($akun['ROLE'] == 1 || $akun['ROLE'] == 2) {
                            ?>
                                <a href="index.php?page=profile" class="dropdown-toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> <span>Profile</span>
                                </a>
                            <?php
                                }
                            ?>
                            </div>
                            <div class="dropdown-item">
                                <a href="config/logout_proses.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> <span>Log Out</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <!-- End Profile -->
                </ul>
            <?php
            }
            ?>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <?php
            if (isset($_SESSION["user"])) {
                $akun = $_SESSION["user"];

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];

                    switch ($page) {
                        case 'beranda':

                            if ($akun['ROLE'] == 3) {
                                include './pages/admin/all_webinar.php';
                            } else {
                                include './pages/home.php';
                            }
                            break;
                        
                        case 'profile':
                            if ($akun['ROLE'] == 1){
                                include './pages/user-profile.php';
                            } else if ($akun['ROLE'] == 2){
                                include './pages/mentor/mentor-profile.php';
                            }
                            break;

                        case 'kategori':
                            if ($akun['ROLE'] == 3) {
                                include './pages/admin/category_manage.php';
                            } else {
                                include './pages/kategori.php';
                            }
                            break;

                        case 'eventku':
                            include './pages/my_event_page.php';
                            break;

                        case 'webinarku':
                            include './pages/mentor/my_webinar.php';
                            break;

                        case 'cari':
                            include './pages/search.php';
                            break;

                        case 'mentor':
                            include './pages/admin/mentor_manage.php';
                            break;

                        case 'detail':
                            include './pages/detail_webinar.php';
                            break;

                        case 'ajukan_mentor':
                            include './pages/mentor/ajukan_mentor.php';
                            break;
                        default:
                            if ($akun['ROLE'] == 3) {
                                include './pages/admin/all_webinar.php';
                            } else {
                                include './pages/home.php';
                            }
                            break;
                    }
                } else {
                    if ($akun['ROLE'] == 3) {
                        include './pages/admin/all_webinar.php';
                    } else {
                        include './pages/home.php';
                    }
                }
            } else {
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];

                    switch ($page) {
                        case 'beranda':
                            include './pages/home.php';
                            break;

                        case 'kategori':
                            include './pages/kategori.php';
                            break;

                        case 'eventku':
                            include './pages/my_event_page.php';
                            break;

                        case 'webinarku':
                            include './pages/mentor/my_webinar.php';
                            break;

                        case 'cari':
                            include './pages/search.php';
                            break;

                        case 'detail':
                            include './pages/detail_webinar.php';
                            break;

                        case 'mentor':
                            include './pages/admin/mentor_manage.php';
                            break;

                        default:
                            include './pages/home.php';
                            break;
                    }
                } else {
                    include './pages/home.php';
                }
            }
            ?>
        </div>
        <!--  END CONTENT PART  -->

    </div>

    <script src="styles/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="styles/bootstrap/js/popper.min.js"></script>
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>
    <script src="styles/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="styles/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="styles/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="styles/plugins/apex/apexcharts.min.js"></script>
    <script src="styles/assets/js/dashboard/dash_1.js"></script>
    <script src="styles/assets/js/custom.js"></script>
    <script src="styles/plugins/highlight/highlight.pack.js"></script>
    <script src="styles/assets/js/scrollspyNav.js"></script>
    <script src="styles/plugins/bootstrap-select/bootstrap-select.min.js"></script>
</body>

</html>

<?php
@$id_user = 0;
if (isset($_SESSION["user"])) {

    @$akun = $_SESSION["user"];
    @$id_user = $akun['USER_ID'];
}


/**
 *
 * INSERT QUERY 
 * 
 */
@$biodata = $_POST['biodata'];
@$last_degree = $_POST['last_degree'];
@$occupation = $_POST['occupation'];
// @$bukti_ijazah = $_POST['bukti_ijazah'];
// @$foto_profil = $_POST['foto_profil'];

/**
 * Upload Ijazah File
 * */
$dir_ijazah = 'media/ijazah/';
@$nama_file_ijazah = $_FILES['bukti_ijazah']['name'];
@$nama_tmp_ijazah = $_FILES['bukti_ijazah']['tmp_name'];
@$tipe_of_ijazah = pathinfo($nama_file_ijazah, PATHINFO_EXTENSION);
$upload_file_ijazah = $dir_ijazah . md5(microtime()) . "." . $tipe_of_ijazah;
$upload_ijazah = move_uploaded_file($nama_tmp_ijazah, $upload_file_ijazah);

/**
 * Upload Foto Profile File
 */
$dir_profile = 'media/profile/';
@$nama_file_profile = $_FILES['foto_profil']['name'];
@$nama_tmp_profile = $_FILES['foto_profil']['tmp_name'];
@$tipe_of_profile = pathinfo($nama_file_profile, PATHINFO_EXTENSION);
$upload_file_profile = $dir_profile . md5(microtime()) . "." . $tipe_of_profile;
$upload_profile = move_uploaded_file($nama_tmp_profile, $upload_file_profile);

@$kirim = $_POST['kirim'];
$query = "INSERT INTO `user_detail`(`USER_ID`, `BIODATA`, `PENDIDIKAN`, `PEKERJAAN`, `FOTO_PROFILE`, `BUKTI_IJAZAH`) VALUES ('$id_user','$biodata','$last_degree','$occupation','$upload_file_profile','$upload_file_ijazah')";
if ($kirim) {
    if ($upload_profile) {
        if ($upload_ijazah) {
            $hasil = mysqli_query($connect, $query);
            if ($hasil) {
                $query_insert_acc_webinar = "INSERT INTO `acc_mentor`(`USER_ID`, `STATUS_PROPOSAL`) VALUES ('$id_user','0')";
                $add_acc_webinar = mysqli_query($connect, $query_insert_acc_webinar);
                if ($add_acc_webinar) {
                    echo "<script>alert('Pendaftaran berhasil, Silakan login kembali'); </script>";
                    echo "<script>location='config/logout_proses.php';</script>";
                } else {
                    // echo "3";
                    echo "<script>alert('Gagal menambahkan data'); </script>";
                    // echo $query_insert_acc_webinar;
                    echo "<script>location='index.php';</script>";
                }
            } else {
                // echo "2";
                // echo $query;
                echo "<script>alert('Gagal menambahkan data'); </script>";
                echo "<script>location='index.php';</script>";
            }
        }
    } else {

        // echo "</p>";
        // echo '<pre>';
        // echo 'Here is some more debugging info:';
        // print_r($_FILES['']);
        // print "</pre>";
        // echo "1";
        // echo $upload;
        // echo $query;
        echo "<script>alert('Gagal menambahkan data'); </script>";
        echo "<script>location='index.php';</script>";
    }
}


?>
<?php
/**
 * 
 * UPDATE Query
 * 
 */
@$biodata_update = $_POST['biodata_update'];
@$last_degree_update = $_POST['last_degree_update'];
@$occupation_update = $_POST['occupation_update'];
@$bukti_ijazah_update_setted = $_POST['bukti_ijazah_update_setted'];
@$foto_profil_update_setted = $_POST['foto_profil_update_setted'];



/**
 * Upload Ijazah File
 * */
$dir_ijazah_update = 'media/ijazah/';
@$nama_file_ijazah_update = $_FILES['bukti_ijazah_update']['name'];
@$nama_tmp_ijazah_update = $_FILES['bukti_ijazah_update']['tmp_name'];
@$tipe_of_ijazah_update = pathinfo($nama_file_ijazah_update, PATHINFO_EXTENSION);

if ($nama_file_ijazah_update == null) {
    $upload_file_ijazah_update = $bukti_ijazah_update_setted;
} else {
    $upload_file_ijazah_update = $dir_ijazah_update . md5(microtime()) . "." . $tipe_of_ijazah_update;
}

$upload_ijazah_update = move_uploaded_file($nama_tmp_ijazah_update, $upload_file_ijazah_update);


/**
 * Upload Foto Profile File
 */
$dir_profil_update = 'media/profile/';
@$nama_file_profil_update = $_FILES['foto_profil_update']['name'];
@$nama_tmp_profil_update = $_FILES['foto_profil_update']['tmp_name'];
@$tipe_of_profil_update = pathinfo($nama_file_profil_update, PATHINFO_EXTENSION);

if ($nama_file_profil_update == null) {
    $upload_file_profil_update = $foto_profil_update_setted;
} else {
    $upload_file_profil_update = $dir_profil_update . md5(microtime()) . "." . $tipe_of_profil_update;
}

$upload_profil_update = move_uploaded_file($nama_tmp_profil_update, $upload_file_profil_update);


@$update = $_POST['update'];
$query_update = "UPDATE `user_detail` SET `BIODATA`='$biodata_update',`PENDIDIKAN`='$last_degree_update',`PEKERJAAN`='$occupation_update',`FOTO_PROFILE`='$upload_file_profil_update',`BUKTI_IJAZAH`='$upload_file_ijazah_update' WHERE `USER_ID`='$id_user'";
if ($update) {
    $hasil = mysqli_query($connect, $query_update);
    if ($hasil) {
        $query_update_acc_webinar = "UPDATE `acc_mentor` SET `STATUS_PROPOSAL`='0' WHERE `USER_ID`='$id_user'";
        $update_acc_webinar = mysqli_query($connect, $query_update_acc_webinar);
        if ($update_acc_webinar) {
            echo "<script>location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal mengupdate data acceptance'); </script>";
            echo "<script>location='index.php';</script>";
        }
    } else {
        // echo "2";
        // echo $query;
        echo "<script>alert('Gagal mengupdate data'); </script>";
        echo "<script>location='index.php';</script>";
    }
}

?>