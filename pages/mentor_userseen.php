<?php
include './config/connection.php';

$user_id = $_GET['id'];

$query = "	SELECT u.*, d.*  
FROM user u
INNER JOIN user_detail d
 ON d.USER_ID = u.USER_ID
 WHERE d.user_id = '$user_id'";
// echo $query;
$data = mysqli_query($connect, $query);
?>
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
                    <h4 style="color:black;"><b><u style="text-decoration-line: underline; text-decoration-color:#4361ee;">Info</u></b></h4>
                </div>
                <?php
                    $i = 0;
                    while (($row = mysqli_fetch_array($data))  && $i <= 2) {

                    ?>
                <div class="user-info">
                    <div class="text-center">
                        <img src="<?php echo $row['FOTO_PROFILE'];?>" alt="avatar" style="width:30%; height:30%; border-radius: 100%;">
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