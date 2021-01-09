<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
if (isset($_POST['submit'])) {
  require_once 'query/query.php';
  require_once 'query/conn.php';
  $conn = new koneksi();
  $name = $_FILES["image"]["name"];
  $size = $_FILES["image"]["size"];
  $tmp = $_FILES["image"]["tmp_name"];
  $eror = $_FILES["image"]["error"];
  $upload = new upload_image($name, $size, $tmp, $eror);
  $image = $upload->image();
  $nama = htmlspecialchars($_POST['nama']);
  $kelas = htmlspecialchars(($_POST['kelas']));
  $visi = htmlspecialchars(($_POST['visi']));
  $misi = htmlspecialchars(($_POST['misi']));
  $insert = new insert_kandidat($nama, $kelas, $visi, $misi, $image);
  if ($insert->input() === true) {
    echo "<script>alert('Kandidat Berhasil Dibuat');window.location.replace('kandidat.php');</script>";
  } else {
    echo "<script>alert('Kandidat Gagal Dibuat');</script>";
  }
  die;
}


?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
  <meta name="robots" content="noindex,nofollow">
  <title>Daftar Pemilih</title>
  <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
  <!-- Custom CSS -->
  <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
  <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
  <!-- Custom CSS -->
  <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
  <?php include 'include/header.php'; ?>
  <?php include 'include/left-nav.php' ?>
  <div class="page-wrapper" style="min-height: 250px;">
    <div class="page-breadcrumb bg-white">
      <div class="row align-items-center">
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <div class="row">
              <div class="col-sm-12">
                <div class="white-box">
                  <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama" required>
                      <label for="kelas">Kelas : </label>
                      <input type="text" class="form-control" id="kelas" name="kelas" required>
                      <label for="visi">Visi</label>
                      <textarea class="form-control" id="visi" rows="3" name="visi" required></textarea>
                      <label for="visi">Misi : </label>
                      <textarea class="form-control" id="visi" rows="3" name="misi" required></textarea>
                      <div class="input-group mb-3">
                        <div class="input-group mt-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01" required>Upload</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image" required>
                            <label class="custom-file-label" for="inputGroupFile01">Foto Kandidat</label>
                          </div>
                        </div>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer text-center"> 2020 &copy; Patroli Keamanan Siswa</a>
    </footer>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>