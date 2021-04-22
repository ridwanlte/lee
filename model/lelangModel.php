<?php

include_once '../koneksi.php';
class lelangModel extends database
{
	
	public function __construct()
	{
		parent::__construct();
    }

    public function add($id_barang, $tgl_lelang, $hrg_akhir, $id_user, $id_petugas, $status){
        $sql = "INSERT INTO tb_lelang VALUES (NULL, '$id_barang', '$tgl_lelang', '$hrg_akhir', '$id_user', '$id_petugas', '$status')";
		$query = $this->koneksi->query($sql) or die($this->koneksi->error);		
			return true;
    }

    public function barang(){
        $sql = "SELECT * FROM tb_barang";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);		
        return $query;
    }

    public function view(){
        $sql = "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang=tb_barang.id_barang";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);		
        return $query;
    }

    public function delete($id_lelang){
        $sql = "DELETE FROM tb_lelang WHERE id_lelang = '$id_lelang' ";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);
        return true;
    }

    public function update($id_lelang, $status){
        $sql = "Update tb_lelang SET status='$status' where id_lelang='$id_lelang' ";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);
        return $query;
    }

}

?>