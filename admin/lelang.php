<?php
include_once 'temp/header.php';
include_once 'temp/topbar.php';
include_once 'temp/sidebar.php';
include_once '../model/lelangModel.php';
$db = new lelangModel();
?>

<div class="content-wrapper">
    <section class="content-header mb-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4 mb-4">
                        <div class="card-header">
                            <h4 class="mb-0 text-gray-800">Data Lelang</h4>
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
                                        <th>Batas Lelang</th>
                                        <th>Harga Akhir</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        if ($db->view()->num_rows>0){
                                        foreach($db->view() as $row){
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_barang']; ?></td>
                                        <td><?= $row['tgl_lelang']; ?></td>
                                        <td><?= $row['hrg_akhir']; ?></td>
                                        <td><?= $row['status']; ?></td>
                                        <td>
                                            <a class="edit btn btn-warning btn-sm"
                                                data-target="#edit<?= $row['id_lelang']; ?>" data-toggle="modal"
                                                role="button"><i class="fas fa-fw fa-edit"></i></a> |
                                            <a class="delete btn btn-danger btn-sm" role="button"
                                                href="../controller/lelang.php?id_lelang=<?= $row['id_lelang']; ?>&act=delete"><i
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
    <div class="modal fade" id="edit<?= $row['id_lelang']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Lelang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-10">
                        <form action="../controller/lelang.php?act=update" method="POST">
                            <table class="table table-borderless">
                                <tr>
                                    <input type="hidden" name="id_lelang" value="<?= $row['id_lelang']; ?>">
                                    <td>Status</td>
                                    <td>
                                        <select name="status" class="form-control">
                                            <option selected disabled value=<?= $row['status'] ?>><?= $row['status'] ?>
                                            </option>
                                            <option value="dibuka">dibuka</option>
                                            <option value="ditutup">ditutup</option>
                                        </select>
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

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Lelang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-10">
                        <form action="../controller/lelang.php?act=add" method="POST">
                            <table class="table table-borderless">
                                <input type="hidden" name="id_user" value="0">
                                <input type="hidden" name="hrg_akhir" value="0">
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>
                                        <select name="id_barang" class="form-control">
                                            <option selected disabled>--Pilih--</option>
                                            <?php
                                                foreach($db->barang() as $d){
                                            ?>
                                            <option value="<?=$d['id_barang']?>"><?=strtoupper($d['nama_barang'])?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Batas Lelang</td>
                                    <td><input type="date" name="tgl_lelang" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <select name="status" class="form-control">
                                            <option selected disabled>--Pilih--</option>
                                            <option value="dibuka">dibuka</option>
                                            <option value="ditutup">ditutup</option>
                                        </select>
                                    </td>
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