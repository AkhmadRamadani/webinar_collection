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
                                </svg>
                            </a>
                        </div>
                        <div class="text-center user-info">
                            <img src="styles/assets/img/user.png" alt="avatar" style="width:30%; height:30%; border-radius: 100%;">
                            <?php
                            if (isset($_SESSION["user"])) {
                                $akun = $_SESSION["user"];
                                $userid = $akun["USER_ID"];
                            }
                            $query = "SELECT * from user u where user_id = '$userid'";
                            $result = mysqli_query($connect, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                 <p class=""><?php echo $row['NAMA']; ?> </p>
                                 <div class="contacts-block list-unstyled">
                                    <div class="contacts-block_item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg> <?php echo $row['EMAIL']; ?>
                                    </div>
                                </div>
                        
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div>
    </div>
    </div> -->