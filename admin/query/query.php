<?php
class upload_image
{
  public $name = "";
  public $size = "";
  public $tmp = "";
  public $eror = "";
  public function __construct($name, $size, $tmp, $eror)
  {
    $this->name = $name;
    $this->size = $size;
    $this->tmp = $tmp;
    $this->eror = $eror;
  }
  public function image()
  {
    $ext = ['jpg', 'jpeg', 'png'];
    $k = "kandidat_";
    $uniq = uniqid();
    $gambar_ext = explode('.', $this->name);
    $gambar_ext = strtolower(end($gambar_ext));
    $name_image = $k . $uniq;
    if (!in_array($gambar_ext, $ext)) {
      echo "<script>alert('Hanya Diperbolehkan Upload Gambar')</script>";
      return false;
      exit;
    }
    $gambar_upload = $name_image . "." . $gambar_ext;
    $move = move_uploaded_file($this->tmp, '../img_uploads/' . $gambar_upload);
    return $gambar_upload;
  }
}

class edit_pemilih
{
  public $nisn = "";
  public $nama = "";
  public $pass = "";
  public $perwakilan = "";
  public $id = "";
  public  function __construct($nisn, $nama, $pass, $perwakilan, $id)
  {
    $this->nisn = $nisn;
    $this->nama = $nama;
    $this->pass = $pass;
    $this->perwakilan = $perwakilan;
    $this->id = $id;
  }
  public function input()
  {
    require_once 'conn.php';
    $conn = new koneksi();
    $nisn = $this->nisn;
    $nama = $this->nama;
    $pass = $this->pass;
    $perwakilan = $this->perwakilan;
    $id = $this->id;
    $data = mysqli_query($conn->conn(), "UPDATE pemilih SET nisn = '$nisn',nama = '$nama',password = '$pass', perwakilan = '$perwakilan' WHERE id = '$id'");
    return $data;
  }
}

class login_user
{
  public $nisn = '';
  public function __construct($nisn)
  {
    $this->nisn = $nisn;
  }

  public function login()
  {
    require_once 'conn.php';
    $conn = new koneksi();
    $nisn = $this->nisn;
    $data = mysqli_query($conn->conn(), "SELECT * FROM pemilih WHERE nisn = '$nisn'");
    return $data;
  }
}

class login
{
  public $username = '';
  public $pass = '';
  public function __construct($username, $pass)
  {
    $this->username = $username;
    $this->pass = $pass;
  }

  public function login()
  {
    require_once 'conn.php';
    $conn = new koneksi();
    $username = $this->username;
    $pass = $this->pass;
    $data = mysqli_query($conn->conn(), "SELECT * FROM data_admin WHERE username = '$username'");
    return $data;
  }
}

class edit_kandidat
{
  public $nama = "";
  public $kelas = "";
  public $visi = "";
  public $misi = "";
  public $foto = "";
  public $id = "";
  public  function __construct($id, $nama, $kelas, $visi, $misi, $foto)
  {
    $this->nama = $nama;
    $this->kelas = $kelas;
    $this->visi = $visi;
    $this->misi = $misi;
    $this->foto = $foto;
    $this->id = $id;
  }
  public function input()
  {
    require_once 'conn.php';
    $conn = new koneksi();
    $nama = $this->nama;
    $kelas = $this->kelas;
    $visi = $this->visi;
    $misi = $this->misi;
    $foto = $this->foto;
    $id = $this->id;
    $data = mysqli_query($conn->conn(), "UPDATE kandidat SET nama = '$nama', kelas = '$kelas', visi = '$visi', misi = '$misi', foto = '$foto' WHERE id = '$id'");
    return $data;
  }
}

class insert_user
{
  public $nisn = "";
  public $password = "";
  public $perwakilan = "";
  public  function __construct($nisn, $password, $perwakilan)
  {
    $this->nisn = $nisn;
    $this->password = $password;
    $this->perwakkilan = $perwakilan;
  }
  public function input()
  {
    require_once 'conn.php';
    $conn = new koneksi();
    $nisn = $this->nisn;
    $password = $this->password;
    $perwakilan = $this->peerwakilan;
    $data = mysqli_query($conn->conn(), "INSERT INTO pemilih (id,nisn,password,perwakilan,status_pemilih) VALUES ('','$nisn','$password', '$perwakilan' 0)");
    return $data;
  }
}



class insert_kandidat
{
  public $nama = "";
  public $kelas = "";
  public $visi = "";
  public $misi = "";
  public $foto = "";
  public  function __construct($nama, $kelas, $visi, $misi, $foto)
  {
    $this->nama = $nama;
    $this->kelas = $kelas;
    $this->visi = $visi;
    $this->misi = $misi;
    $this->foto = $foto;
  }
  public function input()
  {
    require_once 'conn.php';
    $conn = new koneksi();
    $nama = $this->nama;
    $kelas = $this->kelas;
    $visi = $this->visi;
    $misi = $this->misi;
    $foto = $this->foto;
    $data = mysqli_query($conn->conn(), "INSERT INTO kandidat (id,nama,kelas,visi,misi,foto,perolehan) VALUES ('','$nama','$kelas','$visi','$misi','$foto',0)");
    return $data;
  }
}
class insert_pemilih
{
  public $nisn = "";
  public $nama = "";
  public $pass = "";
  public $perwakilan = "";
  public  function __construct($nisn, $nama, $pass, $perwakilan)
  {
    $this->nisn = $nisn;
    $this->nama = $nama;
    $this->pass = $pass;
    $this->perwakilan = $perwakilan;
  }
  public function input()
  {
    require_once 'conn.php';
    $conn = new koneksi();
    $nisn = $this->nisn;
    $nama = $this->nama;
    $pass = $this->pass;
    $perwakilan = $this->perwakilan;
    $data = mysqli_query($conn->conn(), "INSERT INTO pemilih (id,nisn,nama,password,perwakilan,status_pemilih) VALUES ('','$nisn','$nama','$pass','$perwakilan',0)");
    return $data;
  }
}

class suara
{
  public function __construct()
  {
    $conn =  new koneksi();
    $data = mysqli_query($conn->conn(), "UPDATE pemilih set status_pemilih = 1");
  }
}
