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
                <?php
                    if (isset($_SESSION["user"])) {
                        $akun = $_SESSION["user"];
                        $userid = $akun["USER_ID"];
                    }
                    $query = "SELECT u.*, d.* FROM user u INNER JOIN user_detail d ON u.USER_ID = d.USER_ID where u.user_id = '$userid' GROUP BY u.USER_ID, d.USER_ID;";
                    $result = mysqli_query($connect, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="user-info">
                    <div class="text-center">
                        <img src="<?php echo $row['FOTO_PROFILE'];?>" alt="avatar" style="width:130px; height:130px; border-radius: 100%; object-fit: cover;">
                        <p class=""><?php echo $row['NAMA']; ?> </p>
                    </div>
                    <div class="user-info-list text-center">
                        <ul class="contacts-block list-unstyled">
                            <li class="contacts-block__item ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <?php echo $row['EMAIL']; ?>
                            </li>
                            <li class="contacts-block__item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg>
                                <?php echo $row['PEKERJAAN']; ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bio layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Bio</h3>
                        <p><?php echo $row['BIODATA']; ?></p><br>
                    </div>
                </div>
                <div class="education layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Education</h3>
                        <div class="text-center">
                            <img src="<?php echo $row['BUKTI_IJAZAH'];?>" style="width:100%; height:40%; border-radius: 0;">
                            <br><br>
                            <p><?php echo $row['PENDIDIKAN']; ?></p>
                        </div>
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
<!-- </div>
</div>
</div> -->