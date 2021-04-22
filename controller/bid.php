<?php
session_start();
include_once '../model/bidModel.php';
$db = new bidModel();

$act = $_GET['act'];
if ($act=="update"){
    $id_lelang = addslashes($_POST['id_lelang']);
    $id_barang = addslashes($_POST['id_barang']);
    $id_user = $_SESSION['id'];
    $hrg_akhir = addslashes($_POST['hrg_akhir']);
    $db->update($id_lelang, $id_barang, $hrg_akhir, $id_user);
    $db->addHistory($id_lelang, $id_barang, $id_user, $hrg_akhir);
    if ($db){
        echo "<script>alert('Penawaran Lelang Berhasil!');</script>";
        echo "<script>window.location.href='../tawar.php'</script>";
    } else {
        echo "<script>alert('Penawaran Lelang Gagal!');</script>";
        echo "<script>window.location.href='../tawar.php'</script>";
    }
} else if($act == "delete"){
    $cek = $db->deleteHistory($_GET['id_history']);
    if ($cek){
        echo "<script>alert('Delete Berhasil!');</script>";
        echo "<script>window.location.href='../admin/history.php'</script>";
    } else {
        echo "<script>alert('Delete Gagal!');</script>";
        echo "<script>window.location.href='../admin/history.php'</script>";
    }
}