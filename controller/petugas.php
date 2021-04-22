<?php
session_start();
include_once '../model/petugasModel.php';
$db = new petugasModel();

$act = $_GET['act'];
if ($act == "add"){
    $nama_petugas = addslashes($_POST['nama_petugas']);
    $username = addslashes($_POST['username']);
    $password = md5($_POST['password']);
    $id_level = addslashes($_POST['id_level']);
    $cek = $db->registrasi($nama_petugas, $username, $password, $id_level);
    if ($cek){
        echo "<script>alert('Registrasi Berhasil!');</script>";
        echo "<script>window.location.href='../admin/petugas.php'</script>";
    } else {
        echo "<script>alert('Registrasi Gagal!');</script>";
        echo "<script>window.location.href='../admin/petugas.php'</script>";
    }
} else if ($act == "delete"){
    $cek = $db->delete($_GET['id_petugas']);
    if ($cek){
        echo "<script>alert('Delete Berhasil!');</script>";
        echo "<script>window.location.href='../admin/petugas.php'</script>";
    } else {
        echo "<script>alert('Delete Gagal!');</script>";
        echo "<script>window.location.href='../admin/petugas.php'</script>";
    }
} elseif ($act == "update") {
    $id_petugas = addslashes($_POST['id_petugas']);
    $nama_petugas = addslashes($_POST['nama_petugas']);
    $username = addslashes($_POST['username']);
    $password = md5($_POST['password']);
    $id_level = addslashes($_POST['id_level']);
    $cek = $db->update($id_petugas, $nama_petugas, $username, $password, $id_level);
    if ($cek){
        echo "<script>alert('Edit Berhasil!');</script>";
        echo "<script>window.location.href='../admin/petugas.php'</script>";
    } else {
        echo "<script>alert('Edit Gagal!');</script>";
        echo "<script>window.location.href='../admin/petugas.php'</script>";
    }
}
?>