<?php

include_once '../koneksi.php';
class petugasModel extends database
{
	
	public function __construct()
	{
		parent::__construct();
	}

    public function view(){
        $sql = "SELECT * FROM tb_petugas INNER JOIN tb_level ON tb_level.id_level=tb_petugas.id_level ORDER BY level ASC";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);		
        while($cek = mysqli_fetch_array($query)){
            $hasil[] = $cek;
        }
        return $hasil;
    }

    public function registrasi($nama_petugas,$username,$password,$id_level){
		$sql = "INSERT INTO tb_petugas (nama_petugas, username, password, id_level) VALUES ('$nama_petugas', '$username', '$password', '$id_level')";
		$query = $this->koneksi->query($sql) or die($this->koneksi->error);		
			return true;	
    }

    public function level(){
        $sql = "SELECT * FROM tb_level";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);		
        return $query;
    }

    public function delete($id_petugas){
        $sql = "DELETE FROM tb_petugas WHERE id_petugas='$id_petugas' ";
        $query = $this->koneksi->query($sql) or die($this->koneksi->error);
        return $query;
    }

    public function update($id_petugas, $nama_petugas, $username, $password, $id_level){
        $sql = "UPDATE tb_petugas SET nama_petugas='$nama_petugas', username='$username', password='$password', id_level='$id_level' WHERE id_petugas='$id_petugas' ";
        $query = $this->koneksi->query($sql) or die ($this->koneksi->error);
        return $query;
    }
}
?>