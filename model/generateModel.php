<?php

include_once '../koneksi.php';
class generateModel extends database
{
	
	public function __construct()
	{
		parent::__construct();
    }

    public function print(){
        $sql = "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang=tb_barang.id_barang INNER JOIN tb_masyarakat ON tb_lelang.id_user=tb_masyarakat.id_user INNER JOIN tb_petugas ON tb_lelang.id_petugas=tb_petugas.id_petugas where status='ditutup' ";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);		
        return $query;
    }
}
?>