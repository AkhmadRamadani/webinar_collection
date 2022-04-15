<?php
include './config/connection.php';

$akun = $_SESSION['user'];
$id_user = $akun['USER_ID'];

$query = "SELECT t1.*, t2.PARTICIPANTS_COUNT FROM
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
(
SELECT w.WEBINAR_ID,
COUNT(wr.WEBINAR_ID) PARTICIPANTS_COUNT 
FROM webinar w 
JOIN user u ON w.USER_ID = u.USER_ID 
JOIN acc_webinar ac ON ac.WEBINAR_ID = w.WEBINAR_ID 
LEFT JOIN webinar_regist wr ON wr.WEBINAR_ID = w.WEBINAR_ID 
GROUP BY w.WEBINAR_ID 
ORDER BY w.WEBINAR_ID DESC) as t2
WHERE t1.WEBINAR_ID = t2.WEBINAR_ID AND t1.USER_ID = $id_user";


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
            <form action="" method="post">
                <div class="row">
                    <div>
                        <input type="text" class="form-control" placeholder="Kata kunci...">
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
                                <a href="" class="btn btn-danger">Delete</a>
                                <a href="" class="btn btn-secondary">Update</a>
                                <a href="" class="btn btn-success">Detail</a>
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