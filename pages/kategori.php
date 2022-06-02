<?php
include './config/connection.php';
error_reporting(0);
$selected_id_kategori = $_GET['kategori'];
//  wk.KATEGORI_ID, k.NAMA_KATEGORI,
if (isset($_GET['kategori'])) {

$query = "SELECT w.*, u.*, d.*,COUNT(l.ID_LIKE) LIKE_COUNT  
FROM webinar w
INNER JOIN webinar_kategori wk 
 ON wk.WEBINAR_ID = w.WEBINAR_ID 
INNER JOIN kategori k 
 ON wk.KATEGORI_ID = k.KATEGORI_ID 
INNER JOIN user u
 ON w.USER_ID = u.USER_ID
INNER JOIN user_detail d
 ON d.USER_ID = u.USER_ID
LEFT JOIN like_webinar l
 ON w.WEBINAR_ID = l.WEBINAR_ID 
 JOIN acc_webinar aw ON aw.WEBINAR_ID = w.WEBINAR_ID 
 WHERE aw.STATUS_PROPOSAL = 1 
 AND wk.KATEGORI_ID = '$selected_id_kategori'
 GROUP BY w.WEBINAR_ID";
    //  echo $query;
} else {
    $query = "SELECT w.*, u.*, d.*,COUNT(l.ID_LIKE) LIKE_COUNT  
FROM webinar w
LEFT JOIN webinar_kategori wk 
 ON wk.WEBINAR_ID = w.WEBINAR_ID 
INNER JOIN user u
 ON w.USER_ID = u.USER_ID
INNER JOIN user_detail d
 ON d.USER_ID = u.USER_ID
LEFT JOIN like_webinar l
 ON w.WEBINAR_ID = l.WEBINAR_ID
 JOIN acc_webinar aw ON aw.WEBINAR_ID = w.WEBINAR_ID WHERE aw.STATUS_PROPOSAL = 1 
 GROUP BY w.WEBINAR_ID;";
}

$fetcheddata = mysqli_query($connect, $query);
$query_kategori = "SELECT * FROM kategori";
$fetchdatakategori = mysqli_query($connect, $query_kategori);

?>

<script type="text/javascript">
    function handleSelect(data) {
        if (data.value == 0) {

            this.window.location.href = "index.php?page=kategori";
        } else {

            this.window.location.href = "index.php?page=kategori&kategori=" + data.value;
        }
    }
</script>
<!--  BEGIN CONTENT PART  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <!-- header -->
        <!-- <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <div class="title">
                            <h3>Kategori</h3>
                        </div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active"  aria-current="page"><a href="javascript:void(0);">Kategori</a></li>
                        </ol>
                    </nav>
                </div> -->
        <div id="basic" class="col-lg-12">
            <?php
            $jumlahdata = mysqli_num_rows($fetcheddata);
            if ($jumlahdata <= 0) {
            ?>

                <div class="alert alert-primary mb-4" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>Maaf!</strong> Webinar pada kategori tersebut belum ada
                </div>
            <?php
            }
            ?>
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col">
                            <h3>Pilih Kategori</h3>
                        </div>
                        <div class="col">
                            <select class="selectpicker" onchange="javascript:handleSelect(this)" style="">
                                <option value="0">All</option>
                                <?php
                                while ($datakategori = mysqli_fetch_array($fetchdatakategori)) {
                                ?>
                                    <option value="<?php echo $datakategori['KATEGORI_ID']; ?>" <?php if ($selected_id_kategori == $datakategori['KATEGORI_ID']) echo 'selected="selected"'; ?>><?php echo $datakategori['NAMA_KATEGORI']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col"></div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="container-fluid">
                <div class="port portfolio-masonry">
                    <div class="portfolioContainer row photo">
                        <?php
                        while ($data = mysqli_fetch_array($fetcheddata)) {
                        ?>
                        <a href="?page=detail&id=<?php echo $data['WEBINAR_ID']; ?>">
                            <div class="col-lg-4 p-4 " >
                                <div class="item-box">
                                    <div class="card component-card_9">
                                        <img src="<?php echo $data['COVER_WEBINAR'] === null ? "styles/assets/img/400x300.jpg" : $data['COVER_WEBINAR']; ?>" class="card-img-top img-thumbnail" alt="widget-card-2" style="height: 400px; max-width: 100%; object-fit: cover;">
                                        <div class="card-body">
                                            <p class="meta-date"><?php echo date("l, F jS, Y, g:i a", strtotime($data['WAKTU_WEBINAR'])) ?></p>
                                            <h5 class="card-title"><?php echo $data['JUDUL_WEBINAR']; ?></h5>
                                            <p class="card-text"><?php echo substr($data['DESKRIPSI_WEBINAR'], 0, 25) . '...'; ?></p>

                                            <div class="meta-info">
                                                <div class="meta-user">
                                                    <div class="avatar avatar-sm">
                                                    <img src="<?php echo $data['FOTO_PROFILE'];?>" class="" alt="avatar" style="height: 39px; width: 39px; border-radius: 100%; object-fit: cover;" >
                                                    </div>
                                                    <div class="user-name"><?php echo $data['NAMA']; ?></div>
                                                </div>

                                                <div class="meta-action">
                                                    <div class="meta-likes">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg> <?php echo $data['LIKE_COUNT']; ?>
                                                    </div>

                                                    <div class="meta-view">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg> <?php echo $data['LOOKED']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>