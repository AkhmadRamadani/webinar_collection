<?php 

@$id_update_webinar = $_POST['id_update_webinar'];
@$title_update = $_POST['title_update'];
@$description_update = $_POST['description_update'];
@$time_start_update = $_POST['time_start_update'];
@$max_caps_update = $_POST['max_caps_update'];
@$meeting_link_update = $_POST['meeting_link_update'];
@$categories_update = $_POST['kategori'];
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

@$update = $_POST['update'];
$query_update = "UPDATE `webinar` SET `JUDUL_WEBINAR`='$title_update',`DESKRIPSI_WEBINAR`='$description_update',`WAKTU_WEBINAR`='$time_start_update',`MAKS_KAPASITAS`='$max_caps_update',`LINK_MEETING`='$meeting_link_update',`COVER_WEBINAR`='$upload_file_update' WHERE `WEBINAR_ID`='$id_update_webinar'";
if ($update) {
    print_r($_POST);
    // if ($nama_file_update != null) {
    //     if ($upload_update) {
    //         $hasil = mysqli_query($connect, $query_update);
    //         if ($hasil) {
    //             if ($categories_update != null) {
    //                 $last_id = $_POST['id_update_webinar'];
    //                 $query_update_categories = "INSERT INTO `webinar_kategori`(`KATEGORI_ID`, `WEBINAR_ID`) VALUES ";
    //                 $query_update_categories_parts = array();
    //                 foreach ($categories_update as $cat) {
    //                     $query_update_categories_parts[] = "('" . $cat . "', '" . $last_id . "')";
    //                 }
    //                 $query_update_categories .= implode(',', $query_update_categories_parts);
    //                 $add_categories = mysqli_query($connect, $query_update_categories);
    //                 if ($add_categories) {
    //                     print_r($add_categories);
    //                     print($query_update_categories);
    //                     // echo "<script>location='index.php?page=webinarku';</script>";
    //                 }
    //             } else {
    //                 echo "<script>location='index.php?page=webinarku';</script>";
    //             }
    //         } else {
    //             // echo "2";
    //             // echo $query;
    //             echo "<script>alert('Gagal menambahkan data'); </script>";
    //             echo "<script>location='index.php?page=webinarku';</script>";
    //         }
    //     }
    // } else {
    //     $hasil = mysqli_query($connect, $query_update);
    //     if ($hasil) {
    //         if ($categories_update !== NULL) {

    //             $query_update_categories = "INSERT INTO `webinar_kategori`(`KATEGORI_ID`, `WEBINAR_ID`) VALUES ";
    //             $query_update_categories_parts = array();
    //             foreach ($categories_update as $cat) {
    //                 $query_update_categories_parts[] = "('" . $cat . "', '" . $id_update_webinar . "')";
    //             }
    //             $query_update_categories .= implode(',', $query_update_categories_parts);
    //             $add_categories = mysqli_query($connect, $query_update_categories);
    //             if ($add_categories) {
    //                 echo "<script>location='index.php?page=webinarku';</script>";
    //             }
    //         } else {
    //             echo "<script>location='index.php?page=webinarku';</script>";
    //         }
    //     } else {
    //         // echo "2";
    //         // echo $query;
    //         echo "<script>alert('Gagal menambahkan data'); </script>";
    //         echo "<script>location='index.php?page=webinarku';</script>";
    //     }
    // }
}