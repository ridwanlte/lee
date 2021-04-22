<?php
include_once 'temp/header.php';
include_once 'temp/topbar.php';
include_once 'temp/sidebar.php';
include_once '../model/barangModel.php';
$db = new barangModel();
?>

<div class="content-wrapper">
    <section class="content-header mb-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4 mb-4">
                        <div class="card-header">
                            <h4 class="mb-0 text-gray-800">Data Barang</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="card-text mb-3">
                                <a class="btn btn-info text-white" data-target="#tambah" data-toggle="modal"
                                    role="button">Tambah</a>
                            </p>
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Input</th>
                                        <th>Harga Awal</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        if ($db->view()->num_rows>0) {
                                            foreach($db->view() as $row){
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_barang']; ?></td>
                                        <td><?= $row['tgl']; ?></td>
                                        <td><?= $row['hrg_awal']; ?></td>
                                        <td>
                                            <a class="edit btn btn-warning btn-sm"
                                                data-target="#edit<?= $row['id_barang']; ?>" data-toggle="modal"
                                                role="button"><i class="fas fa-fw fa-edit"></i></a> |
                                            <a class="delete btn btn-danger btn-sm" role="button"
                                                href="../controller/barang.php?id_barang=<?= $row['id_barang']; ?>&act=delete"><i
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

    <?php
       foreach($db->view() as $row){
    ?>
    <div class="modal fade" id="edit<?= $row['id_barang']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-10">
                        <form action="../controller/barang.php?act=update" method="POST">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Barang</td>
                                    <input type="hidden" name="id_barang" value="<?= $row['id_barang']; ?>">
                                    <td><input type="text" name="nama_barang" class="form-control"
                                            value="<?= $row['nama_barang']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td><input type="date" name="tgl" class="form-control" value="<?= $row['tgl']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga Awal</td>
                                    <td><input type="number" name="hrg_awal" class="form-control"
                                            value="<?= $row['hrg_awal'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi Barang</td>
                                    <td>
                                        <textarea name="desc_barang" cols="60" rows="5"
                                            value="<?= $row['desc_barang']; ?>"></textarea>
                                    </td>
                                </tr>
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

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-10">
                        <form action="../controller/barang.php?act=add" method="POST">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Barang</td>
                                    <td><input type="text" name="nama_barang" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td><input type="date" name="tgl" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Harga Awal</td>
                                    <td><input type="number" name="hrg_awal" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi Barang</td>
                                    <td><textarea name="desc_barang" cols="60" rows="5"></textarea></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" class="btn btn-primary" value="Tambah">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include_once 'temp/footer.php';
?>