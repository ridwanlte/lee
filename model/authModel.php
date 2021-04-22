<?php

include_once '../koneksi.php';
class authModel extends database
{
	
	public function __construct()
	{
		parent::__construct();
	}
	public function registrasi($nama_lengkap,$username,$password,$tlp){
		$sql = "INSERT INTO tb_masyarakat (nama_lengkap, username, password, tlp) VALUES ('$nama_lengkap', '$username', '$password', '$tlp')";
		$query = $this->koneksi->query($sql) or die($this->koneksi->error);		
			return true;	
	}

	public function getPetugas($username, $password){
		$sql = "SELECT * FROM tb_petugas INNER JOIN tb_level ON tb_petugas.id_level = tb_level.id_level WHERE username = '$username' AND password = '$password'";
		$query = $this->koneksi->query($sql) or die($this->koneksi->error);
		if ($query->num_rows>0) {            
            $row  = $query->fetch_array();
			return $row;
        }
	}

	public function getUser($username, $password){
		$sql = "SELECT * FROM tb_masyarakat WHERE username='$username' AND password='$password' ";
		$query = $this->koneksi->query($sql) or die($this->koneksi->error);		
		if ($query->num_rows>0) {            
            $row  = $query->fetch_array();
			return $row;
        }
	}

	public function details($sql){
        $query = $this->koneksi->query($sql) or die ($this->koneksi->error);
        $row = $query->fetch_array();
        return $row;       
	}
	public function details1($sql1){
        $query1 = $this->koneksi->query($sql1) or die ($this->koneksi->error);
        $row1 = $query1->fetch_array();
        return $row1;       
	}

	public function change(){
		
	}
}
?>