<?php
include './config/connection.php';

$akun = $_SESSION['user'];
$id_user = $akun['USER_ID'];


if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    $query = "SELECT t1.*, t4.PARTICIPANTS_COUNT, t4.CATEGORIES FROM
(
SELECT w.*, u.NAMA, u.EMAIL,
COUNT(l.ID_LIKE) LIKE_COUNT, ac.PESAN, ac.STATUS_PROPOSAL
FROM webinar w 
JOIN user u ON w.USER_ID = u.USER_ID 
LEFT JOIN like_webinar l ON w.WEBINAR_ID = l.WEBINAR_ID 
JOIN acc_webinar ac ON ac.WEBINAR_ID = w.WEBINAR_ID 
GROUP BY w.WEBINAR_ID 
ORDER BY w.WEBINAR_ID DESC
) as t1,
(SELECT t2.*, group_concat(t3.NAMA_KATEGORI separator ', ') as CATEGORIES FROM 
    (
    SELECT w.WEBINAR_ID,
    COUNT(wr.WEBINAR_ID) PARTICIPANTS_COUNT 
    FROM webinar w 
    JOIN user u ON w.USER_ID = u.USER_ID 
    JOIN acc_webinar ac ON ac.WEBINAR_ID = w.WEBINAR_ID 
    LEFT JOIN webinar_regist wr ON wr.WEBINAR_ID = w.WEBINAR_ID 
    GROUP BY w.WEBINAR_ID 
    ORDER BY w.WEBINAR_ID DESC) as t2
    LEFT JOIN 
    (
    SELECT w.WEBINAR_ID, k.NAMA_KATEGORI 
        FROM kategori k, webinar_kategori wk, webinar w 
        WHERE w.WEBINAR_ID = wk.WEBINAR_ID AND k.KATEGORI_ID = wk.KATEGORI_ID
    ) as t3
    ON t2.WEBINAR_ID = t3.WEBINAR_ID
 GROUP BY t2.WEBINAR_ID
) as t4
WHERE t1.WEBINAR_ID = t4.WEBINAR_ID AND t1.USER_ID = $id_user AND (t1.JUDUL_WEBINAR LIKE '%$keyword%' OR t1.DESKRIPSI_WEBINAR LIKE '%$keyword%')";
} else {

    $query = "SELECT t1.*, t4.PARTICIPANTS_COUNT, t4.CATEGORIES FROM
    (
    SELECT w.*, u.NAMA, u.EMAIL,
    COUNT(l.ID_LIKE) LIKE_COUNT, ac.PESAN, ac.STATUS_PROPOSAL
    FROM webinar w 
    JOIN user u ON w.USER_ID = u.USER_ID 
    LEFT JOIN like_webinar l ON w.WEBINAR_ID = l.WEBINAR_ID 
    JOIN acc_webinar ac ON ac.WEBINAR_ID = w.WEBINAR_ID 
    GROUP BY w.WEBINAR_ID 
    ORDER BY w.WEBINAR_ID DESC
    ) as t1,
    (SELECT t2.*, group_concat(t3.NAMA_KATEGORI separator ', ') as CATEGORIES FROM 
        (
        SELECT w.WEBINAR_ID,
        COUNT(wr.WEBINAR_ID) PARTICIPANTS_COUNT 
        FROM webinar w 
        JOIN user u ON w.USER_ID = u.USER_ID 
        JOIN acc_webinar ac ON ac.WEBINAR_ID = w.WEBINAR_ID 
        LEFT JOIN webinar_regist wr ON wr.WEBINAR_ID = w.WEBINAR_ID 
        GROUP BY w.WEBINAR_ID 
        ORDER BY w.WEBINAR_ID DESC) as t2
        LEFT JOIN 
        (
        SELECT w.WEBINAR_ID, k.NAMA_KATEGORI 
            FROM kategori k, webinar_kategori wk, webinar w 
            WHERE w.WEBINAR_ID = wk.WEBINAR_ID AND k.KATEGORI_ID = wk.KATEGORI_ID
        ) as t3
        ON t2.WEBINAR_ID = t3.WEBINAR_ID
     GROUP BY t2.WEBINAR_ID
    ) as t4
    WHERE t1.WEBINAR_ID = t4.WEBINAR_ID AND t1.USER_ID = $id_user";
}


$currentdate = date("Y-m-d");
$fetcheddata = mysqli_query($connect, $query);

$query_kategori = "SELECT * FROM kategori";
$fetchdatakategori = mysqli_query($connect, $query_kategori);


?>
<div class="layout-px-spacing">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Webinar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-vertical" enctype="multipart/form-data" action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group mb-4">
                            <label class="control-label">Title:</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Description:</label>
                            <textarea style="height: 150px;" name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label lass="control-label">Categories:</label>
                            <select class="selectpicker form-control" name="categories[]" multiple>
                                <?php
                                while ($datakategori = mysqli_fetch_array($fetchdatakategori)) {
                                ?>
                                    <option value="<?php echo $datakategori['KATEGORI_ID']; ?>"><?php echo $datakategori['NAMA_KATEGORI']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Time Start:</label>
                            <input type="datetime-local" name="time_start" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Maximal Capacities:</label>
                            <input type="number" name="max_caps" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Meeting Link:</label>
                            <input type="text" name="meeting_link" value="https://" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Cover:</label>

                            <div class="input-group mb-3">

                                <div class="custom-file">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">

                                    <input type="file" class="form-control" name="image_cover">

                                    <!-- <input type="file" class="custom-file-input" name="cover_image">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
                                </div>
                            </div>
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
                        <input type="text" name="page" value="webinarku" hidden>
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
                        <th class="text-center">Title</th>
                        <th class="text-center">Webinar Date</th>
                        <th class="text-center">Capacities</th>
                        <th class="text-center">Participants</th>
                        <th class="text-center">Likes</th>
                        <th class="text-center">Status</th>
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
                        <div class="modal fade" id="deleteConfirmationModal<?php echo $data['WEBINAR_ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Webinar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-vertical" action="" method="POST">
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this <b><?php echo $data['JUDUL_WEBINAR']; ?></b> webinar?</p>
                                        </div>
                                        <input type="text" name="delete_webinar_id" hidden value="<?php echo $data['WEBINAR_ID']; ?>">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Delete" name="delete_webinar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- 
                           END OF DELETE CONFIRMATION MODAL
                         -->

                        <!-- 
                            DETAIL MODAL
                         -->
                        <div class="modal fade" id="detailModal<?php echo $data['WEBINAR_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel">Detail Webinar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center user-info">
                                            <img src="<?php echo $data['COVER_WEBINAR'] === null ? "styles/assets/img/90x90.jpg" : $data['COVER_WEBINAR']; ?>" alt="avatar" style="width: 200px">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label">Title:</label>
                                            <input type="text" name="title" class="form-control" value="<?php echo $data['JUDUL_WEBINAR'] ?>" readonly>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label">Description:</label>
                                            <textarea style="height: 150px;" name="description" class="form-control" value="" readonly><?php echo $data['DESKRIPSI_WEBINAR'] ?></textarea>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label lass="control-label">Categories:</label>
                                            <textarea class="form-control" readonly><?php echo $data['CATEGORIES']; ?></textarea>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label lass="control-label">Acceptance:</label>
                                            <textarea class="form-control" readonly><?php
                                                                                    if ($data['STATUS_PROPOSAL'] == 0) {
                                                                                        echo "WAITING";
                                                                                    } else if ($data['STATUS_PROPOSAL'] == 1) {
                                                                                        echo "ACCEPTED";
                                                                                    } else if ($data['STATUS_PROPOSAL'] == 2) {
                                                                                        echo "REJECTED";
                                                                                    }
                                                                                    ?></textarea>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label lass="control-label">Message:</label>
                                            <textarea class="form-control" readonly><?php echo $data['PESAN']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 
                            END OF DETAIL MODAL
                         -->


                        <!-- 
                            UPDATE MODAL
                         -->
                        <div class="modal fade" id="updateModal<?php echo $data['WEBINAR_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Update Webinar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-vertical" enctype="multipart/form-data" action="" method="POST" id="formupdate<?php echo $data['WEBINAR_ID']; ?>">
                                        <div class="modal-body">
                                            <div class="text-center user-info">
                                                <img src="<?php echo $data['COVER_WEBINAR'] === null ? "styles/assets/img/90x90.jpg" : $data['COVER_WEBINAR']; ?>" alt="avatar" style="width: 200px">
                                            </div>
                                            <input type="text" name="id_update_webinar" class="form-control" value="<?php echo $data['WEBINAR_ID'] ?>" hidden />
                                            <input type="text" name="cover_webinar_setted" class="form-control" value="<?php echo $data['COVER_WEBINAR'] ?>" hidden />

                                            <div class="form-group mb-4">
                                                <label class="control-label">Title:</label>
                                                <input type="text" name="title_update" class="form-control" value="<?php echo $data['JUDUL_WEBINAR'] ?>" />
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Description:</label>
                                                <textarea style="height: 150px;" name="description_update" class="form-control"><?php echo $data['DESKRIPSI_WEBINAR'] ?></textarea>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label class="control-label">Categories:</label>
                                                <select name="update_categories[]" class="selectpicker form-control" form="formupdate<?php echo $data['WEBINAR_ID']; ?>" multiple>
                                                    <?php
                                                    $data_selected_kategori[] = explode(', ', $data['CATEGORIES']);

                                                    $fetchdataupdatekategori = mysqli_query($connect, $query_kategori);

                                                    while ($data_update_kategori = mysqli_fetch_array($fetchdataupdatekategori)) {
                                                    ?>
                                                        <option value="<?php echo $data_update_kategori['KATEGORI_ID']; ?>" <?php echo in_array($data_update_kategori['NAMA_KATEGORI'], $data_selected_kategori[sizeof($data_selected_kategori) - 1]) ? 'selected' : ''; ?>><?php echo $data_update_kategori['NAMA_KATEGORI']; ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label class="control-label">Time Start:</label>
                                                <?php
                                                $newDate = date("Y-m-d\TH:i", strtotime($data['WAKTU_WEBINAR']));
                                                ?>
                                                <input type="datetime-local" name="time_start_update" class="form-control" value="<?php echo $newDate; ?>" />
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Maximal Capacities:</label>
                                                <input type="number" name="max_caps_update" class="form-control" value="<?php echo $data['MAKS_KAPASITAS']; ?>">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Meeting Link:</label>
                                                <input type="text" name="meeting_link_update" value="<?php echo $data['LINK_MEETING']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Cover:</label>

                                                <div class="input-group mb-3">

                                                    <div class="custom-file">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000">

                                                        <input type="file" class="form-control" name="image_cover_update" value="<?php echo $data['COVER_WEBINAR'] ?>">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Update" name="update_my_webinar" form="formupdate<?php echo $data['WEBINAR_ID']; ?>">

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- 
                            END OF UPDATE MODAL
                         -->

                        <tr>
                            <td><?php echo $data['JUDUL_WEBINAR'] ?></td>
                            <td><?php echo $data['WAKTU_WEBINAR'] ?></td>
                            <td><?php echo $data['MAKS_KAPASITAS'] ?></td>
                            <td><?php echo $data['PARTICIPANTS_COUNT'] ?></td>
                            <td><?php echo $data['LIKE_COUNT'] ?></td>
                            <td class="text-center">
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
                                <a href="" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo $data['WEBINAR_ID'] ?>" class="btn btn-danger">Delete</a>
                                <a href="" data-toggle="modal" data-target="#updateModal<?php echo $data['WEBINAR_ID'] ?>" class="btn btn-secondary">Update</a>
                                <a href="" data-toggle="modal" data-target="#detailModal<?php echo $data['WEBINAR_ID'] ?>" class="btn btn-success">Detail</a>
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
@$id_update_webinar = $_POST['id_update_webinar'];
@$title_update = $_POST['title_update'];
@$description_update = $_POST['description_update'];
@$time_start_update = $_POST['time_start_update'];
@$max_caps_update = $_POST['max_caps_update'];
@$meeting_link_update = $_POST['meeting_link_update'];
@$categories_update = $_POST['update_categories'];
@$cover_webinar_setted = $_POST['cover_webinar_setted'];

$dir = 'media/webinar_cover/';
@$nama_file_update = $_FILES['image_cover_update']['name'];
@$nama_tmp_update = $_FILES['image_cover_update']['tmp_name'];
@$tipe_update = pathinfo($nama_file_update, PATHINFO_EXTENSION);
$upload_file_update = "";

if ($nama_file_update == null) {
    $upload_file_update = $cover_webinar_setted;
} else {
    $upload_file_update = $dir . md5(microtime()) . "." . $tipe_update;
}

$upload_update = move_uploaded_file($nama_tmp_update, $upload_file_update);

@$update = $_POST['update_my_webinar'];
$query_update = "UPDATE `webinar` SET `JUDUL_WEBINAR`='$title_update',`DESKRIPSI_WEBINAR`='$description_update',`WAKTU_WEBINAR`='$time_start_update',`MAKS_KAPASITAS`='$max_caps_update',`LINK_MEETING`='$meeting_link_update',`COVER_WEBINAR`='$upload_file_update' WHERE `WEBINAR_ID`='$id_update_webinar'";
if ($update) {
    if ($nama_file_update != null) {
        if ($upload_update) {
            $hasil = mysqli_query($connect, $query_update);
            if ($hasil) {
                $query_delete_kategori = "DELETE FROM `webinar_kategori` WHERE `WEBINAR_ID`='$id_update_webinar'";
                $hasil_delete = mysqli_query($connect, $query_delete_kategori);
                if ($hasil_delete) {
                    $query_update_acc_webinar = "UPDATE `acc_webinar` SET `STATUS_PROPOSAL`='0' WHERE `WEBINAR_ID`='$id_update_webinar'";
                    $update_acc_webinar = mysqli_query($connect, $query_update_acc_webinar);
                    if ($update_acc_webinar) {
                        if ($categories_update != null) {
                            $last_id = $_POST['id_update_webinar'];
                            $query_update_categories = "INSERT INTO `webinar_kategori`(`KATEGORI_ID`, `WEBINAR_ID`) VALUES ";
                            $query_update_categories_parts = array();
                            foreach ($categories_update as $cat) {
                                $query_update_categories_parts[] = "('" . $cat . "', '" . $last_id . "')";
                            }
                            $query_update_categories .= implode(',', $query_update_categories_parts);
                            $add_categories = mysqli_query($connect, $query_update_categories);
                            if ($add_categories) {
                                echo "<script>location='index.php?page=webinarku';</script>";
                            }
                        } else {
                            echo "<script>location='index.php?page=webinarku';</script>";
                        }
                    } else {
                        echo "<script>alert('Gagal mengupdate data acceptance'); </script>";
                        echo "<script>location='index.php?page=webinarku';</script>";
                    }
                }else{
                    echo "<script>alert('Gagal mengupdate data acceptance'); </script>";
                    echo "<script>location='index.php?page=webinarku';</script>";
                }
            } else {
                // echo "2";
                // echo $query;
                echo "<script>alert('Gagal menambahkan data'); </script>";
                echo "<script>location='index.php?page=webinarku';</script>";
            }
        }
    } else {
        $hasil = mysqli_query($connect, $query_update);
        if ($hasil) {
            $query_update_acc_webinar = "UPDATE `acc_webinar` SET `STATUS_PROPOSAL`='0' WHERE `WEBINAR_ID`='$id_update_webinar'";
            $update_acc_webinar = mysqli_query($connect, $query_update_acc_webinar);
            if ($update_acc_webinar) {
                if ($categories_update !== NULL) {

                    $query_update_categories = "INSERT INTO `webinar_kategori`(`KATEGORI_ID`, `WEBINAR_ID`) VALUES ";
                    $query_update_categories_parts = array();
                    foreach ($categories_update as $cat) {
                        $query_update_categories_parts[] = "('" . $cat . "', '" . $id_update_webinar . "')";
                    }
                    $query_update_categories .= implode(',', $query_update_categories_parts);
                    $add_categories = mysqli_query($connect, $query_update_categories);
                    if ($add_categories) {
                        echo "<script>location='index.php?page=webinarku';</script>";
                    }
                } else {
                    echo "<script>location='index.php?page=webinarku';</script>";
                }
            } else {
                echo "<script>alert('Gagal mengupdate data acceptance'); </script>";
                echo "<script>location='index.php?page=webinarku';</script>";
            }
        } else {
            // echo "2";
            // echo $query;
            echo "<script>alert('Gagal mengupdate data'); </script>";
            echo "<script>location='index.php?page=webinarku';</script>";
        }
    }
}

?>


<?php
/**
 * 
 * DELETE QUERY
 * 
 */
@$id_webinar_delete = $_POST['delete_webinar_id'];
@$query_delete_webinar = "DELETE FROM webinar WHERE WEBINAR_ID = '$id_webinar_delete'";

@$delete_webinar_button = $_POST['delete_webinar'];

if ($delete_webinar_button) {

    $deleted_webinar = mysqli_query($connect, $query_delete_webinar);
    if ($deleted_webinar) {
        echo "<script>location='index.php?page=webinarku';</script>";
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
@$description = $_POST['description'];
@$time_start = $_POST['time_start'];
@$max_caps = $_POST['max_caps'];
@$meeting_link = $_POST['meeting_link'];
@$categories = $_POST['categories'];

$dir = 'media/webinar_cover/';
@$nama_file = $_FILES['image_cover']['name'];
@$nama_tmp = $_FILES['image_cover']['tmp_name'];
@$tipe = pathinfo($nama_file, PATHINFO_EXTENSION);
$upload_file = $dir . md5(microtime()) . "." . $tipe;
$upload = move_uploaded_file($nama_tmp, $upload_file);

@$kirim = $_POST['kirim'];
$query = "INSERT INTO `webinar`(`USER_ID`, `JUDUL_WEBINAR`, `DESKRIPSI_WEBINAR`, `WAKTU_WEBINAR`, `MAKS_KAPASITAS`, `LINK_MEETING`, `COVER_WEBINAR`, `LOOKED`) VALUES ('$id_user','$title','$description','$time_start','$max_caps','$meeting_link','$upload_file','0')";
if ($kirim) {
    if ($upload) {
        $hasil = mysqli_query($connect, $query);
        if ($hasil) {

            $last_id = mysqli_insert_id($connect);
            $query_insert_acc_webinar = "INSERT INTO `acc_webinar`(`WEBINAR_ID`, `STATUS_PROPOSAL`) VALUES ('$last_id','0')";
            $add_acc_webinar = mysqli_query($connect, $query_insert_acc_webinar);
            if ($add_acc_webinar) {
                if ($categories !== NULL) {
                    $query_insert_categories = "INSERT INTO `webinar_kategori`(`KATEGORI_ID`, `WEBINAR_ID`) VALUES ";
                    $query_insert_categories_parts = array();
                    foreach ($categories as $cat) {
                        $query_insert_categories_parts[] = "('" . $cat . "', '" . $last_id . "')";
                    }
                    $query_insert_categories .= implode(',', $query_insert_categories_parts);
                    $add_categories = mysqli_query($connect, $query_insert_categories);
                    if ($add_categories) {
                        echo "<script>location='index.php?page=webinarku';</script>";
                    }
                } else {
                    echo "<script>location='index.php?page=webinarku';</script>";
                }
            } else {
                // echo "3";
                echo "<script>alert('Gagal menambahkan data'); </script>";
                // echo $query_insert_acc_webinar;
                echo "<script>location='index.php?page=webinarku';</script>";
            }
        } else {
            // echo "2";
            // echo $query;
            echo "<script>alert('Gagal menambahkan data'); </script>";
            echo "<script>location='index.php?page=webinarku';</script>";
        }
    } else {

        // echo "</p>";
        // echo '<pre>';
        // echo 'Here is some more debugging info:';
        // print_r($_FILES['']);
        // print "</pre>";
        // echo "1";
        // echo $upload;
        // echo $query;
        echo "<script>alert('Gagal menambahkan data'); </script>";
        echo "<script>location='index.php?page=webinarku';</script>";
    }
}


?>