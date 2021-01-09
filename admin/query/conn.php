<?php
class koneksi
{
  public $host = "localhost";
  public $uname = "root";
  public $pass = "";
  public $db = "vote";
  public $koneksi = "";
  public function conn()
  {
    $this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
    return $this->koneksi;
  }
}
