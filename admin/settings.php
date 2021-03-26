<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
$id =  $_SESSION["id"];
require_once 'query/conn.php';
$conn = new koneksi();
$data = mysqli_query($conn->conn(), "SELECT * FROM data_admin WHERE id = '$id'");
if (isset($_POST['submit'])) {
  require_once 'query/query.php';
  $id = htmlspecialchars($_POST["id"]);
  $nama = htmlspecialchars($_POST["nama"]);
  $user = htmlspecialchars($_POST["username"]);
  $pass = htmlspecialchars($_POST["password"]);
  // cek password diisi atau tidak
  // Ketika password kosong update tanpa password
  $admin = new admin($id);
  if ($pass == "") {
    $update = $admin->update($nama, $user);
    var_dump($update);
    die;
  } else {
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $update = $admin->update($nama, $user, $pass);
    var_dump($update);
    die;
  }
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
                  <h2>Setting Akun Admin</h2>
                  <?php foreach ($data as $rows) : ?>
                    <form method="post" action="">
                      <input type="hidden" name="id" value="<?= $rows["id"]; ?>">
                      <div class="form-group">
                        <label for="Nama">Nama : </label>
                        <input type="text" class="form-control" id="Nama" name="nama" required value="<?= $rows["nama"]; ?>">
                        <label for="username">Username : </label>
                        <input type="text" class="form-control" id="username" name="username" required value="<?= $rows["username"]; ?>">
                        <label for="Password">Password : </label>
                        <input type="password" class="form-control" id="Password" name="password" placeholder="Kosongkan bila tidak ingin mengganti password">
                        <input type="submit" name="submit" class="btn btn-primary mt-4">
                    </form>
                  <?php endforeach; ?>
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