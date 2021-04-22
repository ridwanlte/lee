<?php
session_start();
include_once '../model/lelangModel.php';
$db = new lelangModel();

$act = $_GET['act'];
if ($act == "add"){
    $id_barang = addslashes($_POST['id_barang']);
    $tgl_lelang = addslashes($_POST['tgl_lelang']);
    $hrg_akhir = addslashes($_POST['hrg_akhir']);
    $id_user = addslashes($_POST['hrg_akhir']);
    $id_petugas = $_SESSION['id'];
    $status = addslashes($_POST['status']);
    $cek = $db->add($id_barang, $tgl_lelang, $hrg_akhir, $id_user, $id_petugas, $status);
    if ($cek){
        echo "<script>alert('Input Lelang Berhasil!');</script>";
        echo "<script>window.location.href='../admin/lelang.php'</script>";
    } else {
        echo "<script>alert('Input Lelang Gagal!');</script>";
        echo "<script>window.location.href='../admin/lelang.php'</script>";        
    }
} else if ($act == "delete"){
    $cek = $db->delete($_GET['id_lelang']);
    if ($cek){
        echo "<script>alert('Delete Berhasil!');</script>";
        echo "<script>window.location.href='../admin/lelang.php'</script>";
    } else {
        echo "<script>alert('Delete Gagal!');</script>";
        echo "<script>window.location.href='../admin/lelang.php'</script>";
    }
} else if($act=="update"){
    $id_lelang = addslashes($_POST['id_lelang']);
    $status = addslashes($_POST['status']);
    $cek = $db->update($id_lelang, $status);
    if ($cek){
        echo "<script>alert('Edit Lelang Berhasil!');</script>";
        echo "<script>window.location.href='../admin/lelang.php'</script>";
    } else {
        echo "<script>alert('Edit Lelang Gagal!');</script>";
        echo "<script>window.location.href='../admin/lelang.php'</script>";
    }
}
?>