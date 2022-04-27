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
WHERE t1.WEBINAR_ID = t4.WEBINAR_ID AND (t1.JUDUL_WEBINAR LIKE '%$keyword%' OR t1.DESKRIPSI_WEBINAR LIKE '%$keyword%')";
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
    WHERE t1.WEBINAR_ID = t4.WEBINAR_ID";
}


$currentdate = date("Y-m-d");
$fetcheddata = mysqli_query($connect, $query);

$query_kategori = "SELECT * FROM kategori";
$fetchdatakategori = mysqli_query($connect, $query_kategori);


?>
<div class="layout-px-spacing">

    <div class="container-fluid">
        <div class="container-fluid row d-flex justify-content-end">
            <form action="" method="get">
                <div class="row">
                    <div>
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
                                    <form action="" method="post" id="formupdate<?php echo $data['WEBINAR_ID']; ?>">
                                        <div class="modal-body">
                                            <div class="text-center user-info">
                                                <img src="<?php echo $data['COVER_WEBINAR'] === null ? "styles/assets/img/90x90.jpg" : $data['COVER_WEBINAR']; ?>" alt="avatar" style="width: 200px">
                                            </div>
                                            <input type="text" name="id_webinar" class="form-control" value="<?php echo $data['WEBINAR_ID'] ?>" hidden>

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
                                                <label class="control-label">Time Start:</label>
                                                <input type="text" readonly name="time_start" class="form-control" value="<?php echo $data['WAKTU_WEBINAR']; ?>">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Maximal Capacities:</label>
                                                <input type="text" name="max_caps" class="form-control" value="<?php echo $data['MAKS_KAPASITAS']; ?>" readonly>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Meeting Link:</label>
                                                <input type="text" name="meeting_link" value="<?php echo $data['LINK_MEETING']; ?>" class="form-control" readonly>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Acceptance:</label>
                                                <select name="acceptance" id="" class="selectpicker form-control" form="formupdate<?php echo $data['WEBINAR_ID']; ?>">
                                                    <option value="1">Accept</option>
                                                    <option value="2">Decline</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Message:</label>
                                                <textarea style="height: 150px;" name="message" class="form-control"><?php echo $data['PESAN'] ?></textarea>
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
 * INSERT QUERY 
 * 
 */
@$id_webinar = $_POST['id_webinar'];
@$acceptance = $_POST['acceptance'];
@$message = $_POST['message'];

@$kirim = $_POST['kirim'];
$query = "UPDATE `acc_webinar` SET `USER_ID`='$id_user', `PESAN`='$message',`STATUS_PROPOSAL`='$acceptance' WHERE `WEBINAR_ID`='$id_webinar'";
if ($kirim) {

    $hasil = mysqli_query($connect, $query);
    if ($hasil) {
        echo "<script>location='index.php';</script>";
    } else {
        // echo "2";
        // echo $query;
        echo "<script>alert('Gagal mengupdate data'); </script>";
        echo "<script>location='index.php';</script>";
    }
}


?>