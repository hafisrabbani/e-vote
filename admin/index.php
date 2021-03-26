<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
require_once 'query/query.php';
$class = new user();

if (isset($_POST["reset"])) {
  $query = new admin();
  $reset = $query->reset();
  header("Location: user.php");
}

if (isset($_POST["reset"])) {
  $reset = new admin();
  $reset = $reset->reset();
  header("Location: index.php");
}

// total
$total = $class->total_data();
// sudah
$sudah = $class->sudah_pilih();
// belum
$belum = $class->belum_pilih();
// kandidat
$kandidat = $class->total_kandidat();
?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex,nofollow">
  <title>Admin dashborad</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
  <!-- Custom CSS -->
  <!-- <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"> -->
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
      <div class="white-box">
        <div class="row">
          <div class="col-5">
            Selamat Datang Admin
          </div>
          <div class="col-2 offset-5">
            <span class="text-right"><?= date("d-m-Y") ?></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="white-box" style="border-left: 5px solid #707cd2;">
            <h3 class="box-title">Total Kandidat</h3>
            <h1 class="text-center"><?= $kandidat; ?></h1>
          </div>
        </div>
        <div class="col-md-4">
          <div class="white-box" style="border-left: 5px solid #7ace4c;">
            <h3 class="box-title">Pemilih</h3>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Telah Memilih : <?= $sudah ?></li>
              <li class="list-group-item">Belum Memilih : <?= $belum ?></li>
              <li class="list-group-item">Total Pemilih : <?= $total ?></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="white-box" style="border-left: 5px solid #f33155;">
            <h3 class="box-title">Reset Voting</h3>
            <span>Hanya mengubah status dan perolehan(tidak menghapus data)</span>
            <br>
            <form action="" method="POST">
              <button type="submit" class="btn btn-danger mt-2" name="reset"><i class="fas fa-undo-alt" style="font-size: 120%;"></i> Reset</button>
              <span>&nbsp;</span>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include 'include/footer.php'; ?>
    <!-- All Jquery -->
    <!-- ============================================================== -->
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
    <!-- <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script> -->
</body>

</html>