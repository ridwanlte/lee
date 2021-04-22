<?php

session_start();
include_once '../model/barangModel.php';
$db = new barangModel();

$act = $_GET['act'];
if ($act == "add"){
    $nama_barang = addslashes($_POST['nama_barang']);
    $tgl = addslashes($_POST['tgl']);
    $hrg_awal = addslashes($_POST['hrg_awal']);
    $desc_barang = addslashes($_POST['desc_barang']);
    $cek = $db->add($nama_barang, $tgl, $hrg_awal, $desc_barang);
    if ($cek){
        echo "<script>alert('Input Berhasil!');</script>";
        echo "<script>window.location.href='../admin/barang.php'</script>";
    } else {
        echo "<script>alert('Input Gagal!');</script>";
        echo "<script>window.location.href='../admin/barang.php'</script>";
    }
} else if ($act == "update"){
    $id_barang = addslashes($_POST['id_barang']);
    $nama_barang = addslashes($_POST['nama_barang']);
    $tgl = addslashes($_POST['tgl']);
    $hrg_awal = addslashes($_POST['hrg_awal']);
    $desc_barang = addslashes($_POST['desc_barang']);
    $cek = $db->update($id_barang, $nama_barang, $tgl, $hrg_awal, $desc_barang);
    if ($cek){
        echo "<script>alert('Edit Barang Berhasil!');</script>";
        echo "<script>window.location.href='../admin/barang.php'</script>";
    } else {
        echo "<script>alert('Edit Barang Gagal!');</script>";
        echo "<script>window.location.href='../admin/barang.php'</script>";
    }
} else if ($act == "delete"){
    $cek = $db->delete($_GET['id_barang']);
    if ($cek){
        echo "<script>alert('Delete Berhasil!');</script>";
        echo "<script>window.location.href='../admin/barang.php'</script>";
    } else {
        echo "<script>alert('Delete Gagal!');</script>";
        echo "<script>window.location.href='../admin/barang.php'</script>";
    }
}
?>