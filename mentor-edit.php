<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Webinar Collection</title>
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
    <link rel="stylesheet" type="text/css" href="styles/plugins/dropify/dropify.min.css">
    <link href="styles/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />

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
                                    <img src="styles/assets/img/webion.png" class="navbar-logo" alt="logo">
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
                        <h3>Edit Mentor Profile</h3>
                    </div>
                </div>
                <!-- End header -->

                <div class="account-settings-container layout-top-spacing">
                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" class="section general-info">
                                        <div class="info">
                                            <h6 class="">General Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="upload mt-4 pr-md-4">
                                                                <input type="file" id="input-file-max-fs" class="dropify" data-default-file="assets/img/200x200.jpg" data-max-file-size="2M" />
                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Full Name</label>
                                                                            <input type="text" class="form-control mb-4" id="fullName" placeholder="Full Name" value="Narendra Wicaksono">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="dob-input">Date of Birth</label>
                                                                        <div class="d-sm-flex d-block">
                                                                            <div class="form-group mr-1">
                                                                                <select class="form-control" id="exampleFormControlSelect1">
                                                                                    <option>Day</option>
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                    <option>6</option>
                                                                                    <option>7</option>
                                                                                    <option>8</option>
                                                                                    <option>9</option>
                                                                                    <option>10</option>
                                                                                    <option>11</option>
                                                                                    <option>12</option>
                                                                                    <option selected>13</option>
                                                                                    <option>14</option>
                                                                                    <option>15</option>
                                                                                    <option>16</option>
                                                                                    <option>17</option>
                                                                                    <option>18</option>
                                                                                    <option>19</option>
                                                                                    <option>20</option>
                                                                                    <option>21</option>
                                                                                    <option>22</option>
                                                                                    <option>23</option>
                                                                                    <option>24</option>
                                                                                    <option>25</option>
                                                                                    <option>26</option>
                                                                                    <option>27</option>
                                                                                    <option>28</option>
                                                                                    <option>29</option>
                                                                                    <option>30</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group mr-1">
                                                                                <select class="form-control" id="month">
                                                                                    <option>Month</option>
                                                                                    <option>Jan</option>
                                                                                    <option>Feb</option>
                                                                                    <option selected>Mar</option>
                                                                                    <option>Apr</option>
                                                                                    <option>May</option>
                                                                                    <option>Jun</option>
                                                                                    <option>Jul</option>
                                                                                    <option>Aug</option>
                                                                                    <option>Sep</option>
                                                                                    <option>Oct</option>
                                                                                    <option>Nov</option>
                                                                                    <option>Dec</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group mr-1">
                                                                                <select class="form-control" id="year">
                                                                                    <option>Year</option>
                                                                                    <option>2010</option>
                                                                                    <option>2009</option>
                                                                                    <option>2008</option>
                                                                                    <option>2007</option>
                                                                                    <option>2006</option>
                                                                                    <option>2005</option>
                                                                                    <option>2004</option>
                                                                                    <option>2003</option>
                                                                                    <option>2002</option>
                                                                                    <option>2001</option>
                                                                                    <option>2000</option>
                                                                                    <option>1999</option>
                                                                                    <option>1998</option>
                                                                                    <option>1997</option>
                                                                                    <option>1996</option>
                                                                                    <option>1995</option>
                                                                                    <option>1994</option>
                                                                                    <option>1993</option>
                                                                                    <option>1992</option>
                                                                                    <option>1991</option>
                                                                                    <option selected>1990</option>
                                                                                    <option>1989</option>
                                                                                    <option>1988</option>
                                                                                    <option>1987</option>
                                                                                    <option>1986</option>
                                                                                    <option>1985</option>
                                                                                    <option>1984</option>
                                                                                    <option>1983</option>
                                                                                    <option>1982</option>
                                                                                    <option>1981</option>
                                                                                    <option>1980</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="profession">Profession</label>
                                                                    <input type="text" class="form-control mb-4" id="profession" placeholder="Designer" value="Web Developer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="about" class="section about">
                                        <div class="info">
                                            <h5 class="">About</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="form-group">
                                                        <label for="aboutBio">Bio</label>
                                                        <textarea class="form-control" id="aboutBio" placeholder="Tell something interesting about yourself" rows="10">I'm Creative Director and UI/UX Designer from Sydney, Australia, working in web development and print media. I enjoy turning complex problems into simple, beautiful and intuitive designs.

My job is to build your website so that it is functional and user-friendly but at the same time attractive. Moreover, I add personal touch to your product and make sure that is eye-catching and easy to use. My aim is to bring across your message and identity in the most creative way. I created web design for many famous brand companies.</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="work-platforms" class="section work-platforms">
                                        <div class="info">
                                            <h5 class="">Work Platforms</h5>
                                            <div class="row">
                                                <div class="col-md-12 text-right mb-5">
                                                    <button id="add-work-platforms" class="btn btn-primary">Add</button>
                                                </div>
                                                <div class="col-md-11 mx-auto">

                                                    <div class="platform-div">
                                                        <div class="form-group">
                                                            <label for="platform-title">Platforms Title</label>
                                                            <input type="text" class="form-control mb-4" id="platform-title" placeholder="Platforms Title" value="Web Design">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="platform-description">Description</label>
                                                            <textarea class="form-control mb-4" id="platform-description" placeholder="Platforms Description" rows="10">Duis aute irure dolor in reprehenderit in voluptate velit esse eu fugiat nulla pariatur.</textarea>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="contact" class="section contact">
                                        <div class="info">
                                            <h5 class="">Contact</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <select class="form-control" id="country">
                                                                    <option>All Countries</option>
                                                                    <option selected>United States</option>
                                                                    <option>India</option>
                                                                    <option>Japan</option>
                                                                    <option>China</option>
                                                                    <option>Brazil</option>
                                                                    <option>Norway</option>
                                                                    <option>Canada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" class="form-control mb-4" id="address" placeholder="Address" value="New York">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="location">Location</label>
                                                                <input type="text" class="form-control mb-4" id="location" placeholder="Location">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone">Phone</label>
                                                                <input type="text" class="form-control mb-4" id="phone" placeholder="Write your phone number here" value="+1 (530) 555-12121">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="text" class="form-control mb-4" id="email" placeholder="Write your email here" value="Jimmy@gmail.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="website1">Website</label>
                                                                <input type="text" class="form-control mb-4" id="website1" placeholder="Write your website here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="social" class="section social">
                                        <div class="info">
                                            <h5 class="">Social</h5>
                                            <div class="row">

                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group social-linkedin mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                                                                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                                                            <rect x="2" y="9" width="4" height="12"></rect>
                                                                            <circle cx="4" cy="4" r="2"></circle>
                                                                        </svg></span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="linkedin Username" aria-label="Username" aria-describedby="linkedin" value="jimmy_turner">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group social-tweet mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="tweet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter">
                                                                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                                                        </svg></span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Twitter Username" aria-label="Username" aria-describedby="tweet" value="@jTurner">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group social-fb mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="fb"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                                                        </svg></span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Facebook Username" aria-label="Username" aria-describedby="fb" value="Jimmy Turner">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group social-github mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="github"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                                                        </svg></span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Github Username" aria-label="Username" aria-describedby="github" value="@TurnerJimmy">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div id="skill" class="section skill">
                                        <div class="info">
                                            <h5 class="">Skills</h5>
                                            <div class="row progress-bar-section">

                                                <div class="col-md-12 mx-auto">
                                                    <div class="form-group">

                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                <div class="input-form">
                                                                    <input type="text" class="form-control" id="skills" placeholder="Add Your Skills Here" value="">
                                                                    <button id="add-skills" class="btn btn-primary">Add</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-md-11 mx-auto">
                                                    <div class="custom-progress top-right progress-up" style="width: 100%">
                                                        <p class="skill-name">PHP</p>
                                                        <input type="range" min="0" max="100" class="custom-range progress-range-counter" value="25">
                                                        <div class="range-count"><span class="range-count-number" data-rangecountnumber="25">25</span> <span class="range-count-unit">%</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-11 mx-auto">
                                                    <div class="custom-progress top-right progress-up" style="width: 100%">
                                                        <p class="skill-name">Wordpress</p>
                                                        <input type="range" min="0" max="100" class="custom-range progress-range-counter" value="50">
                                                        <div class="range-count"><span class="range-count-number" data-rangecountnumber="50">50</span> <span class="range-count-unit">%</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-11 mx-auto">
                                                    <div class="custom-progress top-right progress-up" style="width: 100%">
                                                        <p class="skill-name">Javascript</p>
                                                        <input type="range" min="0" max="100" class="custom-range progress-range-counter" value="70">
                                                        <div class="range-count"><span class="range-count-number" data-rangecountnumber="70">70</span> <span class="range-count-unit">%</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-11 mx-auto">
                                                    <div class="custom-progress top-right progress-up" style="width: 100%">
                                                        <p class="skill-name">jQuery</p>
                                                        <input type="range" min="0" max="100" class="custom-range progress-range-counter" value="60">
                                                        <div class="range-count"><span class="range-count-number" data-rangecountnumber="60">60</span> <span class="range-count-unit">%</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="edu-experience" class="section edu-experience">
                                        <div class="info">
                                            <h5 class="">Education</h5>
                                            <div class="row">
                                                <div class="col-md-12 text-right mb-5">
                                                    <button id="add-education" class="btn btn-primary">Add</button>
                                                </div>
                                                <div class="col-md-11 mx-auto">

                                                    <div class="edu-section">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="degree1">Enter Your Collage Name</label>
                                                                    <input type="text" class="form-control mb-4" id="degree1" placeholder="Add your education here" value="Royal Collage of Art Designer Illustrator">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Starting From</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6">
                                                                                    <select class="form-control mb-4" id="s-from1">
                                                                                        <option>Month</option>
                                                                                        <option>Jan</option>
                                                                                        <option>Feb</option>
                                                                                        <option>Mar</option>
                                                                                        <option>Apr</option>
                                                                                        <option selected="selected">May</option>
                                                                                        <option>Jun</option>
                                                                                        <option>Jul</option>
                                                                                        <option>Aug</option>
                                                                                        <option>Sep</option>
                                                                                        <option>Oct</option>
                                                                                        <option>Nov</option>
                                                                                        <option>Dec</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <select class="form-control mb-4" id="s-from2">
                                                                                        <option>Year</option>
                                                                                        <option>2020</option>
                                                                                        <option>2020</option>
                                                                                        <option>2018</option>
                                                                                        <option>2017</option>
                                                                                        <option>2016</option>
                                                                                        <option>2015</option>
                                                                                        <option>2014</option>
                                                                                        <option>2013</option>
                                                                                        <option>2012</option>
                                                                                        <option>2011</option>
                                                                                        <option>2010</option>
                                                                                        <option selected="selected">2009</option>
                                                                                        <option>2008</option>
                                                                                        <option>2007</option>
                                                                                        <option>2006</option>
                                                                                        <option>2005</option>
                                                                                        <option>2004</option>
                                                                                        <option>2003</option>
                                                                                        <option>2002</option>
                                                                                        <option>2001</option>
                                                                                        <option>2000</option>
                                                                                        <option>1999</option>
                                                                                        <option>1998</option>
                                                                                        <option>1997</option>
                                                                                        <option>1996</option>
                                                                                        <option>1995</option>
                                                                                        <option>1994</option>
                                                                                        <option>1993</option>
                                                                                        <option>1992</option>
                                                                                        <option>1991</option>
                                                                                        <option>1990</option>
                                                                                    </select>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Ending In</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6 mb-4">
                                                                                    <select class="form-control" id="end-in1">
                                                                                        <option>Month</option>
                                                                                        <option>Jan</option>
                                                                                        <option>Feb</option>
                                                                                        <option>Mar</option>
                                                                                        <option>Apr</option>
                                                                                        <option>May</option>
                                                                                        <option>Jun</option>
                                                                                        <option>Jul</option>
                                                                                        <option>Aug</option>
                                                                                        <option>Sep</option>
                                                                                        <option>Oct</option>
                                                                                        <option>Nov</option>
                                                                                        <option>Dec</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <select class="form-control input-sm" id="end-in2">
                                                                                        <option>Year</option>
                                                                                        <option>2020</option>
                                                                                        <option>2020</option>
                                                                                        <option>2018</option>
                                                                                        <option>2017</option>
                                                                                        <option>2016</option>
                                                                                        <option>2015</option>
                                                                                        <option>2014</option>
                                                                                        <option>2013</option>
                                                                                        <option>2012</option>
                                                                                        <option>2011</option>
                                                                                        <option>2010</option>
                                                                                        <option>2009</option>
                                                                                        <option>2008</option>
                                                                                        <option>2007</option>
                                                                                        <option>2006</option>
                                                                                        <option>2005</option>
                                                                                        <option>2004</option>
                                                                                        <option>2003</option>
                                                                                        <option>2002</option>
                                                                                        <option>2001</option>
                                                                                        <option>2000</option>
                                                                                        <option>1999</option>
                                                                                        <option>1998</option>
                                                                                        <option>1997</option>
                                                                                        <option>1996</option>
                                                                                        <option>1995</option>
                                                                                        <option>1994</option>
                                                                                        <option>1993</option>
                                                                                        <option>1992</option>
                                                                                        <option>1991</option>
                                                                                        <option>1990</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <textarea class="form-control" placeholder="Description" rows="10"></textarea>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="work-experience" class="section work-experience">
                                        <div class="info">
                                            <h5 class="">Work Experience</h5>
                                            <div class="row">
                                                <div class="col-md-12 text-right mb-5">
                                                    <button id="add-work-exp" class="btn btn-primary">Add</button>
                                                </div>
                                                <div class="col-md-11 mx-auto">

                                                    <div class="work-section">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="degree2">Company Name</label>
                                                                    <input type="text" class="form-control mb-4" id="degree2" placeholder="Add your work here" value="Netfilx Inc.">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="degree3">Job Tilte</label>
                                                                            <input type="text" class="form-control mb-4" id="degree3" placeholder="Add your work here" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="degree4">Location</label>
                                                                            <input type="text" class="form-control mb-4" id="degree4" placeholder="Add your work here" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Starting From</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6">
                                                                                    <select class="form-control mb-4" id="wes-from1">
                                                                                        <option>Month</option>
                                                                                        <option>Jan</option>
                                                                                        <option>Feb</option>
                                                                                        <option>Mar</option>
                                                                                        <option>Apr</option>
                                                                                        <option>May</option>
                                                                                        <option>Jun</option>
                                                                                        <option>Jul</option>
                                                                                        <option>Aug</option>
                                                                                        <option>Sep</option>
                                                                                        <option>Oct</option>
                                                                                        <option>Nov</option>
                                                                                        <option>Dec</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <select class="form-control mb-4" id="wes-from2">
                                                                                        <option>Year</option>
                                                                                        <option>2020</option>
                                                                                        <option>2020</option>
                                                                                        <option>2018</option>
                                                                                        <option>2017</option>
                                                                                        <option>2016</option>
                                                                                        <option>2015</option>
                                                                                        <option>2014</option>
                                                                                        <option>2013</option>
                                                                                        <option>2012</option>
                                                                                        <option>2011</option>
                                                                                        <option>2010</option>
                                                                                        <option>2009</option>
                                                                                        <option>2008</option>
                                                                                        <option>2007</option>
                                                                                        <option>2006</option>
                                                                                        <option>2005</option>
                                                                                        <option>2004</option>
                                                                                        <option>2003</option>
                                                                                        <option>2002</option>
                                                                                        <option>2001</option>
                                                                                        <option>2000</option>
                                                                                        <option>1999</option>
                                                                                        <option>1998</option>
                                                                                        <option>1997</option>
                                                                                        <option>1996</option>
                                                                                        <option>1995</option>
                                                                                        <option>1994</option>
                                                                                        <option>1993</option>
                                                                                        <option>1992</option>
                                                                                        <option>1991</option>
                                                                                        <option>1990</option>
                                                                                    </select>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Ending In</label>

                                                                            <div class="row">

                                                                                <div class="col-md-6 mb-4">
                                                                                    <select class="form-control" id="eiend-in1">
                                                                                        <option>Month</option>
                                                                                        <option>Jan</option>
                                                                                        <option>Feb</option>
                                                                                        <option>Mar</option>
                                                                                        <option>Apr</option>
                                                                                        <option>May</option>
                                                                                        <option>Jun</option>
                                                                                        <option>Jul</option>
                                                                                        <option>Aug</option>
                                                                                        <option>Sep</option>
                                                                                        <option>Oct</option>
                                                                                        <option>Nov</option>
                                                                                        <option>Dec</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <select class="form-control input-sm" id="eiend-in2">
                                                                                        <option>Year</option>
                                                                                        <option>2020</option>
                                                                                        <option>2020</option>
                                                                                        <option>2018</option>
                                                                                        <option>2017</option>
                                                                                        <option>2016</option>
                                                                                        <option>2015</option>
                                                                                        <option>2014</option>
                                                                                        <option>2013</option>
                                                                                        <option>2012</option>
                                                                                        <option>2011</option>
                                                                                        <option>2010</option>
                                                                                        <option>2009</option>
                                                                                        <option>2008</option>
                                                                                        <option>2007</option>
                                                                                        <option>2006</option>
                                                                                        <option>2005</option>
                                                                                        <option>2004</option>
                                                                                        <option>2003</option>
                                                                                        <option>2002</option>
                                                                                        <option>2001</option>
                                                                                        <option>2000</option>
                                                                                        <option>1999</option>
                                                                                        <option>1998</option>
                                                                                        <option>1997</option>
                                                                                        <option>1996</option>
                                                                                        <option>1995</option>
                                                                                        <option>1994</option>
                                                                                        <option>1993</option>
                                                                                        <option>1992</option>
                                                                                        <option>1991</option>
                                                                                        <option>1990</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <textarea class="form-control" placeholder="Description" rows="10"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="account-settings-footer">

                        <div class="as-footer-container">

                            <button id="multiple-reset" class="btn btn-warning">Reset All</button>
                            <div class="blockui-growl-message">
                                <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                            </div>
                            <button id="multiple-messages" class="btn btn-primary">Save Changes</button>

                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script src="plugins/dropify/dropify.min.js"></script>
    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="assets/js/users/account-settings.js"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>

</html>