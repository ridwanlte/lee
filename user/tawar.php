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
                            <h4 class="mb-0 text-gray-800">Daftar Lelangan</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Batas Lelang</th>
                                        <th>Deskripsi</th>
                                        <th>Harga Tertinggi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($db->view() as $row){
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_barang']; ?></td>
                                        <td><?= $row['tgl_lelang']; ?></td>
                                        <td><?= $row['desc_barang'] ?></td>
                                        <td><?= $row['hrg_akhir']; ?></td>
                                        <td>
                                            <a class="edit btn btn-warning btn-sm"
                                                data-target="#edit<?= $row['id_lelang']; ?>" data-toggle="modal"
                                                role="button"><i class="fas fa-fw fa-edit"></i></a>

                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
       foreach($db->view() as $row){
    ?>
    <div class="modal fade" id="edit<?= $row['id_lelang']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tawar Lelang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-10">
                        <form action="../controller/bid.php?act=update" method="POST">
                            <table class="table table-borderless">
                                <input type="hidden" name="id_lelang" value="<?= $row['id_lelang']; ?>">
                                <input type="hidden" name="id_barang" value="<?= $row['id_barang'] ?>">
                                <tr>
                                    <td>Harga Sementara</td>
                                    <td>
                                        <input type="number" name="hrg_akhir" value="<?= $row['hrg_akhir'] ?>"
                                            min="<?= $row['hrg_akhir'] ?>">
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>

</div>

<?php
include_once 'temp/footer.php';
?>