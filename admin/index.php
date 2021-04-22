<?php
include_once 'temp/header.php';
include_once 'temp/topbar.php';
include_once 'temp/sidebar.php';
$db = new authModel();
$sql = "SELECT * FROM tb_petugas INNER JOIN tb_level ON tb_petugas.id_level = tb_level.id_level WHERE id_petugas = '".$_SESSION['id']."' ";
$row = $db->details($sql);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">SISTEM ASSET</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="alert alert-success text-center" role="alert">
                <h3 class="alert-heading font-weight-bold">Hi, <?= $row['nama_petugas']; ?>!</h3>
                <p class="text-small">Selamat Datang di Sistem Lelang Anda Login sebagai <?= $row['level'] ?></p>
                <hr>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php
include_once 'temp/footer.php';
?>