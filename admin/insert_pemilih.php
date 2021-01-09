<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
if (isset($_POST['submit'])) {
  require_once 'query/query.php';
  $nisn = htmlspecialchars($_POST['nisn']);
  $nama = htmlspecialchars($_POST['nama']);
  $pass = htmlspecialchars(($_POST['pass']));
  $perwakilan = htmlspecialchars(($_POST['perwakilan']));
  $insert = new insert_pemilih($nisn, $nama, $pass, $perwakilan);
  if ($insert->input() === true) {
    echo "<script>alert('Pemilih Berhasil Dibuat');window.location.replace('user.php');</script>";
  } else {
    echo "<script>alert(Pemilih Gagal Dibuat');</script>";
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
                  <form method="post" action="">
                    <div class="form-group">
                      <label for="nisn">NISN : </label>
                      <input type="text" class="form-control" id="nisn" name="nisn" required>
                      <label for="nama">Nama : </label>
                      <input type="text" class="form-control" id="nama" name="nama" required>
                      <label for="pass">Password : </label>
                      <input type="text" class="form-control" id="pass" name="pass" required value="<?= substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5); ?>">
                      <label for="perwakilan">Perwakilan : </label>
                      <input type="text" class="form-control" id="perwakilan" name="perwakilan" required>
                      <input type="submit" name="submit" class="btn btn-primary mt-4">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'include/footer.php'; ?>
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