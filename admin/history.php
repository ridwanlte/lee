<?php
include_once 'temp/header.php';
include_once 'temp/topbar.php';
include_once 'temp/sidebar.php';
include_once '../model/bidModel.php';
$db = new bidModel();
?>

<div class="content-wrapper">
    <section class="content-header mb-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4 mb-4">
                        <div class="card-header">
                            <h4 class="mb-0 text-gray-800">History Lelang</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Nama User</th>
                                        <th>Penawaran Harga</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        if ($db->viewHistory()->num_rows>0){
                                        foreach($db->viewHistory() as $row){
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_barang']; ?></td>
                                        <td><?= $row['nama_lengkap']; ?></td>
                                        <td><?= $row['hrg_akhir']; ?></td>
                                        <td>
                                            <a class="delete btn btn-danger btn-sm" role="button"
                                                href="../controller/bid.php?id_history=<?= $row['id_history']; ?>&act=delete"><i
                                                    class="fas fa-fw fa-trash-alt"></i></a>
                                        </td>
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