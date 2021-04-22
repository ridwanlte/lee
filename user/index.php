<?php
include_once 'temp/header.php';
include_once 'temp/topbar.php';
include_once 'temp/sidebar.php';
$db = new authModel();
$sql1 = "SELECT * FROM tb_masyarakat WHERE id_user = '".$_SESSION['id']."' ";
$row1 = $db->details1($sql1);
?>
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content-header mb-2">
        <div class="container">
            <div class="alert alert-success text-center mt-4 mb-4" role="alert">
                <h3 class="alert-heading font-weight-bold">Hi, <?= $row1['nama_lengkap'] ?>!</h3>
                <p class="text-small">Selamat datang di Sistem Lelang sebagai masyarakat</p>
                <hr>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php
include_once 'temp/footer.php';
?>