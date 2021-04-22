<?php
include_once 'temp/header.php';
include_once 'temp/topbar.php';
include_once 'temp/sidebar.php';
include_once '../model/petugasModel.php';
$db = new petugasModel();
?>

<div class="content-wrapper">
    <section class="content-header mb-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4 mb-4">
                        <div class="card-header">
                            <h4 class="mb-0 text-gray-800">Data Petugas</h4>
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
                                        <th>Nama Petugas</th>
                                        <th>Username</th>
                                        <th>Level</th>
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
                                        <td><?= $row['nama_petugas']; ?></td>
                                        <td><?= $row['username']; ?></td>
                                        <td><?= $row['level']; ?></td>
                                        <td>
                                            <a class="edit btn btn-warning btn-sm"
                                                data-target="#edit<?= $row['id_petugas']; ?>" data-toggle="modal"
                                                role="button"><i class="fas fa-fw fa-edit"></i></a> |
                                            <a class="delete btn btn-danger btn-sm" role="button"
                                                href="../controller/petugas.php?id_petugas=<?= $row['id_petugas']; ?>&act=delete"><i
                                                    class="fas fa-fw fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php
									}
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
    <div class="modal fade" id="edit<?= $row['id_petugas']; ?>" tabindex="-1" role="dialog"
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
                        <form action="../controller/petugas.php?act=update" method="POST">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Petugas</td>
                                    <input type="hidden" name="id_petugas" value="<?= $row['id_petugas']; ?>">
                                    <td><input type="text" name="nama_petugas" class="form-control"
                                            value="<?= $row['nama_petugas']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="username" class="form-control"
                                            value="<?= $row['username']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="password" class="form-control"
                                            value="<?= $row['password'] ?>"></td>
                                </tr>
                                <tr>
                                    <td>level</td>
                                    <td>
                                        <select name="id_level" class="form-control">
                                            <option selected value="<?=$row['id_level']?>">
                                                <?=strtoupper($row['level'])?>
                                            </option>
                                            <?php
                                                foreach($db->level() as $lv){
                                            ?>
                                            <option value="<?=$lv['id_level']?>"><?=strtoupper($lv['level'])?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-10">
                        <form action="../controller/petugas.php?act=add" method="POST">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Petugas</td>
                                    <td><input type="text" name="nama_petugas" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="username" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="password" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>level</td>
                                    <td>
                                        <select name="id_level" class="form-control">
                                            <option selected disabled>--Pilih--</option>
                                            <?php
                                            foreach ($db->level() as $lv) {
                                        ?>
                                            <option value="<?= $lv['id_level'] ?>"><?= $lv['level'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" class="btn btn-primary" value="registrasi">
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