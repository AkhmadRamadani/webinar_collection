<?php
include './config/connection.php';

$akun = $_SESSION['user'];
$id_user = $akun['USER_ID'];

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    $query = "SELECT * FROM kategori WHERE NAMA_KATEGORI LIKE '%$keyword%' ";
} else {
    $query = "SELECT * FROM kategori";
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
                        <input type="text" name="page" value="kategori" hidden>
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
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Category Icon</th>
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
                        <div class="modal fade" id="deleteConfirmationModal<?php echo $data['KATEGORI_ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-vertical" action="" method="POST">
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this <b><?php echo $data['NAMA_KATEGORI']; ?></b> category?</p>
                                        </div>
                                        <input type="text" name="delete_kategori_id" hidden value="<?php echo $data['KATEGORI_ID']; ?>">
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
                        <div class="modal fade" id="updateModal<?php echo $data['KATEGORI_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Update Webinar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-vertical" enctype="multipart/form-data" action="" method="POST" id="formupdate<?php echo $data['KATEGORI_ID']; ?>">
                                        <div class="modal-body">

                                            <input type="text" name="id_update_kategori" class="form-control" value="<?php echo $data['KATEGORI_ID'] ?>" hidden />

                                            <div class="form-group mb-4">
                                                <label class="control-label">Category Name:</label>
                                                <input type="text" name="title_update" class="form-control" value="<?php echo $data['NAMA_KATEGORI'] ?>" />
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Update" name="update" form="formupdate<?php echo $data['KATEGORI_ID']; ?>">

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- 
                            END OF UPDATE MODAL
                         -->

                        <tr>
                            <td><?php echo $data['KATEGORI_ID'] ?></td>
                            <td><?php echo $data['NAMA_KATEGORI'] ?></td>
                            <td><?php echo $data['ICON_KATEGORI'] ?></td>
                            <td class="text-center">
                                <a href="" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo $data['KATEGORI_ID'] ?>" class="btn btn-danger">Delete</a>
                                <a href="" data-toggle="modal" data-target="#updateModal<?php echo $data['KATEGORI_ID'] ?>" class="btn btn-secondary">Update</a>
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
@$id_update_webinar = $_POST['id_update_kategori'];
@$title_update = $_POST['title_update'];

@$update = $_POST['update'];
$query_update = "UPDATE `kategori` SET `NAMA_KATEGORI`='$title_update' WHERE `KATEGORI_ID`='$id_update_webinar'";
if ($update) {

    $hasil = mysqli_query($connect, $query_update);
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