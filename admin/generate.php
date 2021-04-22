<?php
include_once 'temp/header.php';
include_once 'temp/topbar.php';
include_once 'temp/sidebar.php';
include_once '../model/generateModel.php';
$db = new generateModel();
?>

<div class="content-wrapper">
    <section class="content-header mb-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4 mb-4">
                        <div class="card-header">
                            <h4 class="mb-0 text-gray-800">Generate</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="card-text mb-5">
                                <a href="cetak.php" target="_blank" class="btn btn-success text-white float-right"><i
                                        class="fas fa-fw fa-print"></i></a>
                            </p>
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Akhir</th>
                                        <th>Nama User</th>
                                        <th>Nama Petugas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        if ($db->print()->num_rows>0){
                                        foreach($db->print() as $row){
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_barang']; ?></td>
                                        <td><?= $row['hrg_akhir']; ?></td>
                                        <td><?= $row['nama_lengkap']; ?></td>
                                        <td><?= $row['nama_petugas']; ?></td>
                                    </tr>
                                    <?php
                                        }}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
include_once 'temp/footer.php';
?>