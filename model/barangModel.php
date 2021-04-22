<?php

include_once '../koneksi.php';
class barangModel extends database
{
	
	public function __construct()
	{
		parent::__construct();
    }

    public function add($nama_barang,$tgl,$hrg_awal,$desc_barang){
        $sql = "INSERT INTO tb_barang (nama_barang, tgl, hrg_awal, desc_barang) VALUES ('$nama_barang', '$tgl', '$hrg_awal', '$desc_barang')";
		$query = $this->koneksi->query($sql) or die($this->koneksi->error);		
			return true;
    }

    public function view(){
        $sql = "SELECT * FROM tb_barang";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);		
        return $query;
    }

    public function update($id_barang, $nama_barang,$tgl,$hrg_awal,$desc_barang){
        $sql = "Update tb_barang SET nama_barang='$nama_barang', tgl='$tgl', hrg_awal='$hrg_awal', desc_barang='$desc_barang' where id_barang='$id_barang' ";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);
        return true;

    }

    public function delete($id_barang){
        $sql = "DELETE FROM tb_barang WHERE id_barang = '$id_barang' ";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);
        return true;
    }
}
?>