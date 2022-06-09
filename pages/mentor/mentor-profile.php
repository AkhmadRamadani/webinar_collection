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
                                      <form class="form-vertical" enctype="multipart/form-data" action="" method="POST">
                                          <div class="modal-body">

                                              <input type="text" name="id_update_user" class="form-control" value="<?php echo $row['USER_ID'] ?>" hidden />

                                              <div class="form-group mb-4">
                                                  <label class="control-label">Name:</label>
                                                  <input type="text" name="name" class="form-control" value="<?php echo $row['NAMA'] ?>" />
                                              </div>
                                              <div class="form-group mb-4">
                                                  <label class="control-label">Email:</label>
                                                  <input type="text" name="email" class="form-control" value="<?php echo $row['EMAIL'] ?>" />
                                              </div>
                                              <div class="form-group mb-4">
                                                  <label class="control-label">Bio:</label>
                                                  <textarea type="text" name="biodata_update" class="form-control"><?php echo $row['BIODATA']; ?></textarea>
                                              </div>
                                              <div class="form-group mb-4">
                                                  <label class="control-label">Education:</label>
                                                  <input type="text" name="last_degree_update" class="form-control" value="<?php echo $row['PENDIDIKAN']; ?>">
                                              </div>
                                              <div class="form-group mb-4">
                                                  <label class="control-label">Occupation:</label>
                                                  <input type="text" name="occupation_update" class="form-control" value="<?php echo $row['PEKERJAAN']; ?>">
                                              </div>
                                              <div class="form-group mb-4">
                                                  <label class="control-label">Last Degree of Education:</label>

                                                  <div class="input-group mb-3">

                                                      <div class="custom-file">
                                                          <input type="hidden" name="MAX_FILE_SIZE" value="3000000">

                                                          <input type="file" class="form-control" name="ijazah_bukti">

                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="text-center user-info">
                                                  <img src="<?php echo $row['BUKTI_IJAZAH'] === null ? "styles/assets/img/90x90.jpg" : $row['BUKTI_IJAZAH']; ?>" alt="avatar" style="width: 200px">
                                              </div>
                                              <input type="text" name="ijazah_bukti_setted" value="<?php echo $row['BUKTI_IJAZAH'] ?>" hidden>
                                              <input type="text" name="profil_mentor_update_setted" value="<?php echo $row['FOTO_PROFILE'] ?>" hidden>
                                              <div class="form-group mb-4">
                                                  <label class="control-label">Photo Profile:</label>

                                                  <div class="input-group mb-3">

                                                      <div class="custom-file">
                                                          <input type="hidden" name="MAX_FILE_SIZE" value="3000000">

                                                          <input type="file" class="form-control" name="profil_mentor_update">

                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="text-center user-info">
                                                  <img src="<?php echo $row['FOTO_PROFILE'] === null ? "styles/assets/img/90x90.jpg" : $row['FOTO_PROFILE']; ?>" alt="avatar" style="width: 200px">
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <input type="submit" class="btn btn-primary" value="Update" name="update_mentor_profile">

                                          </div>

                                      </form>
                                  </div>
                              </div>
                          </div>
                          <div class="user-info">
                              <div class="text-center">
                                  <img src="<?php echo $row['FOTO_PROFILE']; ?>" alt="avatar" style="width:130px; height:130px; border-radius: 100%; object-fit: cover;">
                                  <p class=""><?php echo $row['NAMA']; ?> </p>
                              </div>
                              <div class="user-info-list text-center">
                                  <ul class="contacts-block list-unstyled">
                                      <li class="contacts-block__item ">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                              <polyline points="22,6 12,13 2,6"></polyline>
                                          </svg>
                                          <?php echo $row['EMAIL']; ?>
                                      </li>
                                      <li class="contacts-block__item">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee">
                                              <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                                              <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                                              <line x1="6" y1="1" x2="6" y2="4"></line>
                                              <line x1="10" y1="1" x2="10" y2="4"></line>
                                              <line x1="14" y1="1" x2="14" y2="4"></line>
                                          </svg>
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
                                      <img src="<?php echo $row['BUKTI_IJAZAH']; ?>" style="width:100%; height:40%; border-radius: 0;">
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
    /**
     * 
     * UPDATE Query
     * 
     */
    @$biodata_update = $_POST['biodata_update'];
    @$last_degree_update = $_POST['last_degree_update'];
    @$occupation_update = $_POST['occupation_update'];
    @$ijazah_bukti_setted = $_POST['ijazah_bukti_setted'];
    @$profil_mentor_update_setted = $_POST['profil_mentor_update_setted'];
    @$name = $_POST['name'];
    @$email = $_POST['email'];


    /**
     * Upload Ijazah File
     * */
    $dir_ijazah_update = 'media/ijazah/';
    @$nama_file_ijazah_update = $_FILES['ijazah_bukti']['name'];
    @$nama_tmp_ijazah_update = $_FILES['ijazah_bukti']['tmp_name'];
    @$tipe_of_ijazah_update = pathinfo($nama_file_ijazah_update, PATHINFO_EXTENSION);

    if ($nama_file_ijazah_update == null) {
        $uploaded_ijazah_location = $ijazah_bukti_setted;
    } else {
        $uploaded_ijazah_location = $dir_ijazah_update . md5(microtime()) . "." . $tipe_of_ijazah_update;
    }

    $upload_ijazah_update = move_uploaded_file($nama_tmp_ijazah_update, $uploaded_ijazah_location);


    /**
     * Upload Foto Profile File
     */
    $dir_profil_update = 'media/profile/';
    @$nama_file_profil_update = $_FILES['profil_mentor_update']['name'];
    @$nama_tmp_profil_update = $_FILES['profil_mentor_update']['tmp_name'];
    @$tipe_of_profil_update = pathinfo($nama_file_profil_update, PATHINFO_EXTENSION);

    if ($nama_file_profil_update == null) {
        $uploaded_profil_location = $profil_mentor_update_setted;
    } else {
        $uploaded_profil_location = $dir_profil_update . md5(microtime()) . "." . $tipe_of_profil_update;
    }

    $upload_profil_update = move_uploaded_file($nama_tmp_profil_update, $uploaded_profil_location);


    @$update_mentor_profile = $_POST['update_mentor_profile'];
    $query_update = "UPDATE `user_detail` SET `BIODATA`='$biodata_update',`PENDIDIKAN`='$last_degree_update',`PEKERJAAN`='$occupation_update',`FOTO_PROFILE`='$uploaded_profil_location',`BUKTI_IJAZAH`='$uploaded_ijazah_location' WHERE `USER_ID`='$userid'";
    if ($update_mentor_profile) {
        // echo "<script>alert('$query_update'); </script>";
        $hasil = mysqli_query($connect, $query_update);
        if ($hasil) {
            $query_update_acc_webinar = "UPDATE `acc_mentor` SET `STATUS_PROPOSAL`='0' WHERE `USER_ID`='$userid'";
            $update_acc_webinar = mysqli_query($connect, $query_update_acc_webinar);
            if ($update_acc_webinar) {
                $query_update_user = "UPDATE `user` SET `NAMA`='$name',`EMAIL`='$email', `ROLE` = '1' WHERE `USER_ID`='$userid'";
                $update_user = mysqli_query($connect, $query_update_user);
                if ($update_user) {
                    $login_again = "SELECT u.*, ud.BIODATA, 
                    ud.PENDIDIKAN, ud.PEKERJAAN, 
                    ud.FOTO_PROFILE, ud.BUKTI_IJAZAH,
                    am.MESSAGE, am.STATUS_PROPOSAL 
                    FROM user u 
                    LEFT JOIN user_detail ud 
                    ON u.USER_ID = ud.USER_ID
                    LEFT JOIN acc_mentor am 
                    ON u.USER_ID = am.USER_ID
                                where u.USER_ID = '$userid'";
                    $login = mysqli_query($connect, $login_again);

                    if (mysqli_num_rows($login) >= 1) {
                        $akun = $login->fetch_assoc();
                        $_SESSION["user"] = $akun;

                        echo "<script>location='index.php?page=profile';</script>";
                    }else{

                        echo "<script>location='index.php?page=profile';</script>";
                    }
                    // echo "<script>alert('$query_update_user'); </script>";
                } else {

                    echo "<script>alert('Gagal mengupdate data user'); </script>";
                    echo "<script>location='index.php?page=profile';</script>";
                }
            } else {
                echo "<script>alert('Gagal mengupdate data acceptance'); </script>";
                echo "<script>location='index.php?page=profile';</script>";
            }
        } else {
            // echo "2";
            // echo $query;
            echo "<script>alert('Gagal mengupdate data'); </script>";
            echo "<script>location='index.php?page=profile';</script>";
        }
    }

    ?>
  <!-- </div>
</div>
</div> -->