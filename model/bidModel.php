<?php

include_once '../koneksi.php';
class bidModel extends database
{
	
	public function __construct()
	{
		parent::__construct();
    }

    public function view(){
        $sql = "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang=tb_barang.id_barang where status='dibuka' ";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);
        return $query;
    }

    public function update($id_lelang, $id_barang, $hrg_akhir, $id_user){
        $sql = "Update tb_lelang SET hrg_akhir='$hrg_akhir', id_user='$id_user', id_barang='$id_barang' where id_lelang='$id_lelang' ";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);
        return $query;
    }
    public function addHistory($id_lelang, $id_barang, $id_user, $hrg_akhir){
        $sql = "INSERT INTO tb_history VALUES (NULL, '$id_lelang', '$id_barang', '$id_user', '$hrg_akhir')";
		$query = $this->koneksi->query($sql) or die($this->koneksi->error);		
			return true;
    }

    public function viewHistory(){
        $sql = "SELECT * FROM tb_history INNER JOIN tb_barang ON tb_history.id_barang=tb_barang.id_barang INNER JOIN tb_masyarakat ON tb_history.id_user=tb_masyarakat.id_user ";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);		
            return $query;
    }

    public function deleteHistory($id_history){
        $sql = "DELETE FROM tb_history WHERE id_history = '$id_history' ";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);
        return true;
    }
}
?>