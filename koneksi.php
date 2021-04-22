<?php
class database{
 
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'lelang';
 
    protected $koneksi;
 
    public function __construct(){
 
        if (!isset($this->koneksi)) {
 
            $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);
 
            if (!$this->koneksi) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
 
        return $this->koneksi;
    }
}
?>