<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
require_once 'query/conn.php';
$conn = new koneksi();
$data = mysqli_query($conn->conn(), "SELECT * FROM pemilih ORDER BY status_pemilih");
if (isset($_POST["reset"])) {
  $reset = mysqli_query($conn->conn(), "UPDATE pemilih SET status_pemilih = '0'");
  header("Location: user.php");
}
?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, Ample lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Ample admin lite dashboard bootstrap 4 dashboard template">
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
          <a href="insert_pemilih.php" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Insert Pemilih</a>
          <form action="" method="post"><input type="submit" value="Reset" name="reset" class="btn btn-danger"></form>
          <div class="white-box">
            <div class="row">
              <div class="col-sm-12">
                <div class="white-box">
                  <h3 class="box-title">List Pemilih</h3>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="border-top-0">No</th>
                          <th class="border-top-0">Nama</th>
                          <th class="border-top-0">NISN</th>
                          <th class="border-top-0">Password</th>
                          <th class="border-top-0">Perwakilan</th>
                          <th class="border-top-0">Status</th>
                          <th class="border-top-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach ($data as $row) : ?>
                          <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["nisn"]; ?></td>
                            <td><?= $row["password"]; ?></td>
                            <td><?= $row["perwakilan"]; ?></td>
                            <td><?php if ($row["status_pemilih"] === "0") : ?>
                                <span>Belum memilih</span>
                              <?php else : ?>
                                <p style="color:#05e641;"><b>Telah Memilih</b></p>
                              <?php endif; ?>
                            </td>
                            <td><a href="delete_pemilih.php?id=<?= $row["id"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
                              <a href="edit_pemilih.php?id=<?= $row["id"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
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