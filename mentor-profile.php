<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Webinar Collection</title>
    <link href="styles/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="styles/assets/js/loader.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="styles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="styles/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="styles/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="styles/assets/css/components/cards/card.css" rel="stylesheet" type="text/css" />

    <link href="styles/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
</head>

<body class="alt-menu sidebar-noneoverflow">

    <!-- load -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!-- load end -->

    <!-- Navbar -->
    <div class="header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"></a>
            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="/">
                    <img alt="logo" src="styles/assets/img/90x90.jpg">
                    <span class="navbar-brand-name">WEBION</span></a>
            </div>

            <!-- START TOPBAR -->
            <ul class="navbar-item topbar-navigation">
                <div class="topbar-nav header navbar" role="banner">
                    <nav id="topbar">
                        <ul class="navbar-nav theme-brand flex-row  text-center">
                            <li class="nav-item theme-logo">
                                <a href="/">
                                    <img src="styles/assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                                </a>
                            </li>
                            <li class="nav-item theme-text">
                                <a href="/" class="nav-link"> WEBION </a>
                            </li>
                        </ul>
                        <ul class="list-unstyled menu-categories" id="topAccordion">
                            <li class="menu single-menu">
                                <a href="index.php" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <span>Dashboard</span>
                                    </div>
                                </a>
                            </li>
                            <li class="menu single-menu">
                                <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <span>Kategori</span>
                                    </div>
                                </a>
                            </li>
                            <li class="menu single-menu">
                                <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <span>My Events</span>
                                    </div>
                                </a>
                            </li>
                            <li class="menu single-menu">
                                <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <span>My Webinar</span>
                                    </div>
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
            </ul>
            <!--  END TOPBAR  -->

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
                                    <h5>Mentor-name</h5>
                                    <p>Mentor</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="mentor-profile.php">
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
            <!-- End Notification -->
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  Main Container  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  Content  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <!-- Header -->
                <div class="page-header">
                    <div class="title">
                        <h3>Mentor Profile</h3>
                    </div>
                </div>
                <!-- End header -->

                <div class="row layout-spacing">
                    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                        <!-- User Profile -->
                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                    <h3 class="">Info</h3>
                                    <a href="#" class="mt-2 edit-profile">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                        </svg></a>
                                </div>
                                <div class="text-center user-info">
                                    <img src="styles/assets/img/90x90.jpg" alt="avatar">
                                    <p class="">Narendra Wicaksono</p>
                                </div>
                                <!-- Information List -->
                                <div class="user-info-list">

                                    <div class="">
                                        <ul class="contacts-block list-unstyled">
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee">
                                                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                                    <line x1="6" y1="1" x2="6" y2="4"></line>
                                                    <line x1="10" y1="1" x2="10" y2="4"></line>
                                                    <line x1="14" y1="1" x2="14" y2="4"></line>
                                                </svg> Web Developer
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                </svg>13 Maret 1990
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                </svg>Malang, Indonesia
                                            </li>
                                            <li class="contacts-block__item">
                                                <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                        <polyline points="22,6 12,13 2,6"></polyline>
                                                    </svg>narendra@gmail.com</a>
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                                </svg> +6281357370622
                                            </li>
                                            <li class="contacts-block__item">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <div class="social-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                                            </svg>
                                                        </div>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <div class="social-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter">
                                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                                            </svg>
                                                        </div>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <div class="social-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                                                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                                                <rect x="2" y="9" width="4" height="12"></rect>
                                                                <circle cx="4" cy="4" r="2"></circle>
                                                            </svg>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Information List -->
                            </div>
                        </div>
                        <!-- End User Profile -->

                        <div class="education layout-spacing ">
                            <div class="widget-content widget-content-area">
                                <h3 class="">Education</h3>
                                <div class="timeline-alter">
                                    <div class="item-timeline">
                                        <div class="t-meta-date">
                                            <p class="">04 Maret 2009</p>
                                        </div>
                                        <div class="t-dot">
                                        </div>
                                        <div class="t-text">
                                            <p>Politeknik Negeri Malang</p>
                                            <p>Teknik Informatika</p>
                                        </div>
                                    </div>
                                    <div class="item-timeline">
                                        <div class="t-meta-date">
                                            <p class="">25 April 2014</p>
                                        </div>
                                        <div class="t-dot">
                                        </div>
                                        <div class="t-text">
                                            <p>Institut Teknologi Surabaya (ITS)</p>
                                            <p>Designer Illustrator</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                        <div class="skills layout-spacing ">
                            <div class="widget-content widget-content-area">
                                <h3 class="">Skills</h3>
                                <div class="progress br-30">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-title"><span>PHP</span> <span>25%</span> </div>
                                    </div>
                                </div>
                                <div class="progress br-30">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-title"><span>Javascript</span> <span>70%</span> </div>
                                    </div>
                                </div>
                                <div class="progress br-30">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-title"><span>jQuery</span> <span>60%</span> </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="bio layout-spacing ">
                            <div class="widget-content widget-content-area">
                                <h3 class="">Bio</h3>
                                <!-- Paragraf 1 -->
                                <p>Halo!. Perkenalkan Saya Pengembang Web dari Malang. </p>

                                <!-- Paragraf 2 -->
                                <p>Saya membuat kode dan mendesain sebuah situs web.</p>

                                <div class="bio-skill-box">

                                    <div class="row">

                                        <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-5 ">

                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Photograhpy</h5>
                                                    <!-- <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia anim id est laborum.</p> -->
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-0 ">

                                            <div class="d-flex b-skills">
                                                <div>
                                                </div>
                                                <div class="">
                                                    <h5>Mobile Apps</h5>
                                                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do et dolore magna aliqua.</p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-7 col-sm-12 ">

                            <div class="work-experience layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Work Experience</h3>
                                    <div class="timeline-alter">

                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p class="">04 Maret 2009</p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>Netfilx Inc.</p>
                                                <p>Backend Development</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline">
                                            <div class="t-meta-date">
                                                <p class="">25 April 2014</p>
                                            </div>
                                            <div class="t-dot">
                                            </div>
                                            <div class="t-text">
                                                <p>Google Inc.</p>
                                                <p>Designer Illustrator</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="styles/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="styles/bootstrap/js/popper.min.js"></script>
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>
    <script src="styles/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="styles/assets/js/app.js"></script>
    <script src="styles/plugins/apex/apexcharts.min.js"></script>
    <script src="styles/assets/js/dashboard/dash_1.js"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

</html>