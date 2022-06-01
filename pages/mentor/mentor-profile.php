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
                <?php
                    if (isset($_SESSION["user"])) {
                        $akun = $_SESSION["user"];
                        $userid = $akun["USER_ID"];
                    }
                    $query = "SELECT u.*, d.* FROM user u INNER JOIN user_detail d ON u.USER_ID = d.USER_ID where u.user_id = '$userid' GROUP BY u.USER_ID, d.USER_ID;";
                    $result = mysqli_query($connect, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="d-flex justify-content-between">
                    <h3 class="">Info</h3>
                    <a href="" data-toggle="modal" data-target="#updateModal<?php echo $row['USER_ID'] ?>" class="mt-2 edit-profile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- 
                    UPDATE MODAL
                -->
                <div class="modal fade" id="updateModal<?php echo $row['USER_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Update Mentor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-vertical" enctype="multipart/form-data" action="" method="POST" id="formupdate<?php echo $row['USER_ID']; ?>">
                                <div class="modal-body">

                                    <input type="text" name="id_update_user" class="form-control" value="<?php echo $row['USER_ID'] ?>" hidden />

                                    <div class="form-group mb-4">
                                        <label class="control-label">Name:</label>
                                        <input type="text" name="nama" class="form-control" value="<?php echo $row['NAMA'] ?>" />
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="control-label">Email:</label>
                                        <input type="text" name="email" class="form-control" value="<?php echo $row['EMAIL'] ?>" />
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="control-label">Occupation:</label>
                                        <input type="text" name="pekerjaan" class="form-control" value="<?php echo $row['PEKERJAAN'] ?>" />
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Bio:</label>
                                        <input type="text" name="bio" class="form-control" value="<?php echo $row['BIODATA'] ?>" />
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Education:</label>
                                        <input type="text" name="pendidikan" class="form-control" value="<?php echo $row['PENDIDIKAN'] ?>" />
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Update" name="update" form="formupdate<?php echo $row['USER_ID']; ?>">

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
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
<?php
$id_user = $_POST['id_update_user'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$pekerjaan = $_POST['pekerjaan'];
$bio = $_POST['bio'];
$pendidikan = $_POST['pendidikan'];

$update = $_POST['update'];
$query_update = "UPDATE user, user_detail 
                    SET user.NAMA='$nama', user.EMAIL='$email',
                    user_detail.BIODATA ='$bio', user_detail.PENDIDIKAN ='$pendidikan', user_detail.PEKERJAAN='$pekerjaan' 
                    WHERE user.USER_ID=user_detail.USER_ID AND user_detail.USER_ID ='$id_user';";

if ($update) {
    $up = mysqli_query($connect, $query_update);
    if ($up) {
        echo "<script>location='index.php?page=profile';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data'); </script>";
        echo "<script>location='index.php?page=profile';</script>";
    }
}

?>
<!-- </div>
</div>
</div> -->