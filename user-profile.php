<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Webinar Collection - User Profile Page</title>
    <link rel="icon" type="image/x-icon" href="styles/assets/img/logo.png"/>
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
                    <img alt="logo" src="styles/assets/img/webion.png">
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
                                    <h5>User-name</h5>
                                    <p>User</p>
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
                        <h3>User Profile</h3>
                    </div>
                    <div class="layout-spacing">
                        <a href="registermentor.php">
                            <button class="btn btn-outline-primary">Ajukan Mentor</button>
                        </a>
                    </div>
                </div>
                <!-- End header -->

                <!-- Card -->
                <div class="card component-card_4 user-profile">
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
                            <?php
                            include "config/connection.php";

                            $query = "SELECT nama,email from user";
                            $result = mysqli_query($connect, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <p class=""><?php echo $row['nama']; ?> </p>
                        </div>
                        <div class="user-info-list">
                            <div class="">
                                <ul class="contacts-block list-unstyled">
                                    <li class="contacts-block_item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg> <?php echo $row['email']; ?>
                                    </li>
                                </ul>
                            </div>
                    <?php
                                }
                            }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>