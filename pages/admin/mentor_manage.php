<?php
include './config/connection.php';

$akun = $_SESSION['user'];
$id_user = $akun['USER_ID'];

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    $query = "SELECT * FROM 
    user u 
    JOIN user_detail ud 
    ON u.USER_ID = ud.USER_ID 
    JOIN acc_mentor am 
    ON am.USER_ID = u.USER_ID
    WHERE u.NAMA LIKE '%$keyword%' 
    GROUP BY u.USER_ID";
} else {
    $query = "SELECT * FROM 
    user u 
    JOIN user_detail ud 
    ON u.USER_ID = ud.USER_ID 
    JOIN acc_mentor am 
    ON am.USER_ID = u.USER_ID
    GROUP BY u.USER_ID";
}


$currentdate = date("Y-m-d");
$fetcheddata = mysqli_query($connect, $query);


?>
<div class="layout-px-spacing">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-vertical" enctype="multipart/form-data" action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group mb-4">
                            <label class="control-label">Category Name:</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save" name="kirim">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="container-fluid row d-flex justify-content-between">
            <div class="p-2 mb-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add
                </button>
            </div>
            <form action="" method="get">
                <div class="row">
                    <div>
                        <input type="text" name="page" value="mentor" hidden>
                        <input type="text" class="form-control" placeholder="Kata kunci..." name="keyword">
                    </div>
                    <div class="p-2 mb-3">
                        <input type="submit" id="btn-add" class="btn btn-dark" value="Cari" />
                    </div>
                </div>
            </form>


        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-4">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Pendidikan</th>
                        <th class="text-center">Pekerjaan</th>
                        <th class="text-center">Status Pengajuan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_array($fetcheddata)) {
                    ?>
                        <!-- 
                            DELETE CONFIRMATION MODAL
                         -->
                        <div class="modal fade" id="deleteConfirmationModal<?php echo $data['USER_ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Mentor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-vertical" action="" method="POST">
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this <b><?php echo $data['NAMA']; ?></b>'s proposal?</p>
                                        </div>
                                        <input type="text" name="delete_kategori_id" hidden value="<?php echo $data['USER_ID']; ?>">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Delete" name="delete_kategori">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- 
                           END OF DELETE CONFIRMATION MODAL
                         -->



                        <!-- 
                            UPDATE MODAL
                         -->
                        <div class="modal fade" id="updateModal<?php echo $data['USER_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Detail Mentor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" method="post" id="formupdate<?php echo $data['USER_ID']; ?>">
                                        <div class="modal-body">
                                            <div class="text-center user-info">
                                                <img src="<?php echo $data['FOTO_PROFILE'] === null ? "styles/assets/img/90x90.jpg" : $data['FOTO_PROFILE']; ?>" alt="avatar" style="width: 200px">
                                            </div>
                                            <input type="text" name="id_webinar" class="form-control" value="<?php echo $data['USER_ID'] ?>" hidden>

                                            <div class="form-group mb-4">
                                                <label class="control-label">Title:</label>
                                                <input type="text" name="title" class="form-control" value="<?php echo $data['NAMA'] ?>" readonly>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Biodata:</label>
                                                <textarea style="height: 150px;" name="description" class="form-control" value="" readonly><?php echo $data['BIODATA'] ?></textarea>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label lass="control-label">Education:</label>
                                                <textarea class="form-control" readonly><?php echo $data['PENDIDIKAN']; ?></textarea>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Occupation:</label>
                                                <input type="text" readonly name="time_start" class="form-control" value="<?php echo $data['PEKERJAAN']; ?>">
                                            </div>
                                            <label class="control-label">Bukti Ijazah:</label>
                                            <img src="<?php echo $data['BUKTI_IJAZAH'] === null ? "styles/assets/img/90x90.jpg" : $data['BUKTI_IJAZAH']; ?>" alt="avatar" style="width: 200px">

                                            <div class="form-group mb-4">
                                                <label class="control-label">Acceptance:</label>
                                                <select name="acceptance" id="" class="selectpicker form-control" form="formupdate<?php echo $data['USER_ID']; ?>">
                                                    <option value="1" <?php echo $data['STATUS_PROPOSAL'] == 1  ? 'selected' : '' ?>>Accept</option>
                                                    <option value="2" <?php echo $data['STATUS_PROPOSAL'] == 2  ? 'selected' : '' ?>>Decline</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Message:</label>
                                                <textarea style="height: 150px;" name="message" class="form-control"><?php echo $data['MESSAGE'] ?></textarea>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Update" name="update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- 
                            END OF UPDATE MODAL
                         -->

                        <tr>

                            <td><?php echo $data['USER_ID'] ?></td>
                            <td><?php echo $data['NAMA'] ?></td>
                            <td><?php echo $data['PENDIDIKAN'] ?></td>
                            <td><?php echo $data['PEKERJAAN'] ?></td>
                            <td>
                                <?php
                                if ($data['STATUS_PROPOSAL'] == 0) {
                                ?>

                                    <span class="text-secondary">WAITING
                                    </span>
                                <?php
                                } else if ($data['STATUS_PROPOSAL'] == 1) {
                                ?>

                                    <span class="text-success">ACCEPTED
                                    </span>
                                <?php
                                } else if ($data['STATUS_PROPOSAL'] == 2) { ?>

                                    <span class="text-danger">REJECTED
                                    </span>
                                <?php
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a href="" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo $data['USER_ID'] ?>" class="btn btn-danger">Delete</a>
                                <a href="" data-toggle="modal" data-target="#updateModal<?php echo $data['USER_ID'] ?>" class="btn btn-secondary">Update</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>


    </div>
    <div class="footer-wrapper">

    </div>

</div>
<?php
/**
 * 
 * UPDATE Query
 * 
 */
@$id_webinar = $_POST['id_webinar'];
@$acceptance = $_POST['acceptance'];
@$message = $_POST['message'];

@$kirim = $_POST['update'];
$query = "UPDATE `acc_mentor` SET `ADMIN_ID`='$id_user', `MESSAGE`='$message',`STATUS_PROPOSAL`='$acceptance' WHERE `USER_ID`='$id_webinar'";
if ($kirim) {

    $hasil = mysqli_query($connect, $query);
    if ($hasil) {
        if ($acceptance == 1) {
            $query_change_role = "UPDATE user SET ROLE = '2' WHERE `USER_ID`='$id_webinar'";
            $change_role = mysqli_query($connect, $query_change_role);

            if ($change_role) {
                echo "<script>location='index.php?page=mentor';</script>";
            } else {

                echo "<script>alert('Gagal mengupdate data'); </script>";
                echo "<script>location='index.php?page=mentor';</script>";
            }
        } else if ($acceptance == 2) {
            $query_change_role = "UPDATE user SET ROLE = '1' WHERE `USER_ID`='$id_webinar'";
            $change_role = mysqli_query($connect, $query_change_role);

            if ($change_role) {
                echo "<script>location='index.php?page=mentor';</script>";
            } else {

                echo "<script>alert('Gagal mengupdate data'); </script>";
                echo "<script>location='index.php?page=mentor';</script>";
            }
        } else {
            echo "<script>location='index.php?page=mentor';</script>";
        }
    } else {
        // echo "2";
        // echo $query;
        echo "<script>alert('Gagal mengupdate data'); </script>";
        echo "<script>location='index.php?page=mentor';</script>";
    }
}


?>


<?php
/**
 * 
 * DELETE QUERY
 * 
 */
@$id_webinar_delete = $_POST['delete_kategori_id'];
@$query_delete_webinar = "DELETE FROM kategori WHERE KATEGORI_ID = '$id_webinar_delete'";

@$delete_webinar_button = $_POST['delete_kategori'];

if ($delete_webinar_button) {

    $deleted_webinar = mysqli_query($connect, $query_delete_webinar);
    if ($deleted_webinar) {
        echo "<script>location='index.php?page=kategori';</script>";
    }
}
?>

<?php
/**
 *
 * INSERT QUERY 
 * 
 */
@$title = $_POST['title'];
@$kirim = $_POST['kirim'];
$query = "INSERT INTO `kategori` (`NAMA_KATEGORI`) VALUES ('$title')";
if ($kirim) {

    $hasil = mysqli_query($connect, $query);
    if ($hasil) {
        echo "<script>location='index.php?page=kategori';</script>";
    } else {
        // echo "2";
        // echo $query;
        echo "<script>alert('Gagal menambahkan data'); </script>";
        echo "<script>location='index.php?page=kategori';</script>";
    }
}


?>