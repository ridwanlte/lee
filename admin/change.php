<?php
include_once 'temp/header.php';
include_once 'temp/topbar.php';
include_once 'temp/sidebar.php';
include_once '../model/authModel.php';
?>

<div class="content-wrapper">
    <div class="content-header mb-2">
        <div class="container">
            <div class="card shadow  mt-4 mb-4">
                <div class="card-header py-3">
                    <h2 class="h4 mb-0 text-gray-800">Setting</h2>
                </div>
                <form action="../controller/auth.php" method="post">
                    <div class="row ml-5 mb-2 mt-3">
                        <div class="col-md-6">
                            <input type="hidden" name="id_admin" value="">
                            <P><b>Password Lama</b></p>
                            <input class="form-control" type="password" name="pertama" placeholder="Password Lama..."
                                required>
                            <P><b>Password Baru</b></p>
                            <input class="form-control" type="password" name="kedua" value=""
                                placeholder="Password Baru..." required>
                            <P><b>Ulangi Password Baru</b></p>
                            <input class="form-control" type="password" name="ketiga" value=""
                                placeholder="Password Baru..." required>
                        </div>
                    </div>
                    <div class="row ml-5 mb-4 mt-3">
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-info" name="change">Update</button>&nbsp;<input
                                type="reset" class="btn btn-danger" value="Reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'temp/footer.php';
?>