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
    <link href="styles/assets/css/components/custom-carousel.css" rel="stylesheet" type="text/css">
    <link href="styles/assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/assets/css/elements/alert.css">

    <?php
    session_start();
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
                <a class="navbar-brand" href="index.php"><img alt="logo" src="styles/assets/img/90x90.jpg"> <span class="navbar-brand-name">WEBION</span></a>
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
                                $akun = $_SESSION["user"];
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
                                    ?>
                                            <li>
                                                <a href="#"> Ajukan Mentor </a>
                                            </li>
                                        <?php
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
                                <img src="styles/assets/img/90x90.jpg" class="img-fluid" alt="admin-profile">
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
                                <a href="user_profile.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> <span>Profile</span>
                                </a>
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
                    default:
                        include './pages/home.php';
                        break;
                }
            } else {
                include './pages/home.php';
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
</body>

</html>