<?php

session_start();
include_once '../model/authModel.php';
$user = new authModel();
if (isset($_POST['register']))
{
    $nama_lengkap = addslashes($_POST['nama_lengkap']);
    $username = addslashes($_POST['username']);
    $password = md5(addslashes($_POST['password']));
    $tlp = addslashes($_POST['tlp']);
    $cek = $user->registrasi($nama_lengkap, $username, $password, $tlp);
    if ($cek){
        echo "<script>alert('Registrasi Berhasil!');</script>";
        echo "<script>window.location.href='../index.php'</script>";
    } else {
        echo "<script>alert('Registrasi Gagal!');</script>";
        echo "<script>window.location.href='../registrasi.php'</script>";
    }
}

if (isset($_POST['login'])){
    $username = addslashes($_POST['username']);
    $password = md5(addslashes($_POST['password']));
    $cek = $user->getPetugas($username, $password);
    if (!$cek) {
        echo "<script>alert('login Gagal!');</script>";
        echo "<script>window.location.href='../index.php'</script>";
    }else if($cek['level'] == "administrator" || $cek['level'] == "petugas") {
        $_SESSION['id'] = $cek['id_petugas'];
        $_SESSION['level'] = $cek['level'];
        echo "<script>alert('login Berhasil!');</script>";
        echo "<script>window.location.href='../admin/index.php'</script>";
    // } else if ($cek['level'] == "petugas"){
    //     $_SESSION['id'] = $cek['id_petugas'];
    //     $_SESSION['level'] = $cek['level'];
    //     echo "<script>alert('login Petugas Berhasil!');</script>";
    //     echo "<script>window.location.href='../petugas/index.php'</script>";
    }
}else if (isset($_POST['userLogin'])){
    $username = addslashes($_POST['username']);
    $password = md5(addslashes($_POST['password']));
    $cek1 = $user->getUser($username, $password);
    if (!$cek1) {
        echo "<script>alert('login Gagal!');</script>";
        echo "<script>window.location.href='../index.php'</script>";
    } else {
        $_SESSION['id'] = $cek1['id_user'];
        echo "<script>alert('login Berhasil masyarakat!');</script>";
        echo "<script>window.location.href='../user/index.php'</script>";
    }
}

if (isset($_POST['change'])) {
    $id_petugas = addslashes($_POST['id_petugas']);
    $lama = md5(addslashes($_POST['pertama']));
    $baru = md5(addslashes($_POST['kedua']));
    $ulang = md5(addslashes($_POST['ketiga']));
    $cek = $user->change($id_petugas);
    if(!$cek){
        echo "<script type='text/javascript'>alert('Gagal, Ulangi!')</script>";
        echo "<script>window.location='change.php';</script>";
    } else {
        if($baru==$ulang){
            echo "<script>alert('Update Password Berhasil!');</script>";
            echo "<script>window.location='change.php';</script>";
        }else{
            echo "<script type='text/javascript'>alert('Password tidak sama, Ulangi!')</script>";
            echo "<script>window.location='change.php';</script>";
        }
    }
}

?>