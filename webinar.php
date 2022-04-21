<?php
include './config/connection.php';
if(isset($_GET['WEBINAR_ID'])){
    $webinar_id=$_GET['WEBINAR_ID'];
    $sql ="SELECT w.*, wk.*, k.*, u.*, COUNT(l.ID_LIKE) LIKE_COUNT  
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
HAVING w.WEBINAR_ID = '$webinar_id';";
}
else {
    die ("Error. No ID Selected!");    
}
$webinar = mysqli_query($connect, $sql);
$result = mysqli_fetch_assoc($webinar);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Webinar Collection</title>
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
    <link href="styles/assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/components/custom-media_object.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="styles/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="styles/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <script src="styles/plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="styles/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="styles/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->

    <?php
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

    <div class="header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            </a>
            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="/"><img alt="logo" src="styles/assets/img/90x90.jpg"> <span class="navbar-brand-name">WEBION</span></a>
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
                            <li class="menu single-menu <?php echo isset($_GET['page']) ? '' : 'active'?> ">
                                <a href="index.php"  class="dropdown-toggle autodroprown">
                                    <div class="">
                                        <span>Dashboard</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </a>
                            </li>
                            <li class="menu single-menu <?php echo $page === 'kategori' ? 'active' : ''?> ">
                                <a href="index.php?page=kategori" class="dropdown-toggle">
                                    <div class="">
                                        <span>Kategori</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </a>
                            </li>
                            <li class="menu single-menu">
                                <a href="#" class="dropdown-toggle">
                                    <div class="">
                                        <span>My Events</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </a>
                            </li>
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
                                    <li>
                                        <a href="#"> Ajukan Mentor </a>
                                    </li>
                                    <li>
                                        <a href="#"> Register </a>
                                    </li>
                                    <li>
                                        <a href="#"> Login </a>
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
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                    </form>
                </li>
            </ul>
            <!-- Search -->
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
                            <img src="styles/assets/img/90x90.jpg" class="img-fluid" alt="admin-profile">
                        </div>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <div class="media-body">
                                    <h5>Username</h5>
                                    <p>user</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="user_profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> <span>Profile</span>
                            </a>
                        </div>
                    </div>
                </li>
                <!-- End Profile -->
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN CONTENT PART  -->
        <div id="content">
            <div id="basic" class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="image-wrapper mb-2" style="background: #888ea8; text-align: center;">
                                    <img src="<?php echo $result['COVER_WEBINAR'] === null ? "styles/assets/img/400x300.jpg" : $result['COVER_WEBINAR']; ?>" style="height: 500px; max-width: 100%; object-fit: cover;" alt>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                        </path>
                                    </svg>&nbsp;<?php echo $result['LIKE_COUNT']; ?>
                                    &nbsp;&nbsp;&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                        </path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>&nbsp;<?php echo $result['LOOKED']; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mt-1 mb-1" style="width: 550px; height: 20px;"><h6 class=""><?php echo date("l, F jS, Y, g:i a", strtotime($result['WAKTU_WEBINAR'])) ?></h6></div>
                                <div class="mt-1 mb-1" style="width: 550px; height: 50px;"><h3 class=""><?php echo $result['JUDUL_WEBINAR']; ?></h3></div>
                                <div class="mt-1 mb-1" style="width: 550px; height: 280px;"><p class=""><?php echo $result['DESKRIPSI_WEBINAR']; ?></p></div>
                                <div class="image-wrapper avatar mt-2 mb-4" style="width: 550px; height: 50px;">
                                    <img alt="avatar" src="styles/assets/img/90x90.jpg" class="rounded-circle" style="width: 50px; height: 50px;"/>&nbsp;&nbsp;&nbsp;<?php echo $result['NAMA']; ?>
                                </div>
                                <button class="btn btn-primary btn-block mb-4 mr-2">Daftar</button>
                                <a href="javascript:void(0);" class="btn btn-success btn-block mb-4 mr-2">Join Webinar Live</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src="styles/assets/js/scrollspyNav.js"></script>
    <script src="styles/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="styles/plugins/sweetalerts/custom-sweetalert.js"></script>
    <!-- END THEME GLOBAL STYLE -->
</body>

</html>