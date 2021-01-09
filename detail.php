<?php
session_start();
if (!isset($_SESSION["login_user"])) {
  header("Location: index.php");
}
$id = $_GET["id"];
if (!is_numeric($id)) {
  echo "No Sqli Injection";
  die;
}
require_once 'admin/query/conn.php';
$conn = new koneksi();
$data = mysqli_query($conn->conn(), "SELECT * FROM kandidat WHERE id = $id");
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .bgp {
      background-color: #707cd2;
    }

    .bgs {
      background-color: #7ace4c;
    }

    .jumbotron {
      text-align: center;
      padding-top: 10rem;
      padding-bottom: 10rem;
      text-shadow: 2px 2px #000;
    }

    .lead span {
      color: orange;
      font-weight: bold;
    }

    .bg-cover {
      background-size: cover;
      color: white;
      background-position: center center;
      position: relative;
      z-index: -2;
    }

    .overlay {
      background-color: #000;
      opacity: 0.5;
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      z-index: -1;
    }

    .bg-cover {
      background-image: url('img_uploads/garo.jpg');
    }
  </style>
  <title>E Vote Patroli Keamanan Siswa</title>
</head>

<body style="background-color:#edf1f5;">
  <div class="jumbotron jumbotron bg-cover">
    <div class="overlay"></div>
    <div class="container">
      <h3 class="display-4 mb-1">E Voting Patroli Keamanan Siswa</h3>
      <p class="lead"><span><?= date("d-m-Y"); ?></span></p>
    </div>
  </div>
  <div class="container" style="border-radius:20px;">
    <h3 class="text-center">Detail Kandidat</h3>
    <div class="row justify-content-center">
      <?php foreach ($data as $rows) : ?>
        <div class="col-lg-8 col-md-10 ">
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="img_uploads/<?= $rows["foto"]; ?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $rows["nama"]; ?></h5>
                  <p class="card-text"><small class="text-muted">Kelas : <?= $rows["kelas"]; ?></small></p>
                  <p class="card-text"><b>Visi : </b></p>
                  <p class="card-text"><?= $rows["visi"]; ?></p>
                  <p class="card-text"><b>Misi : </b></p>
                  <p class="card-text"><?= $rows["misi"]; ?></p>
                </div>
              </div>
            </div>
            <a href="voting.php?id=<?= $rows["id"]; ?>" class="btn bgs text-white">Pilih</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <p class="text-center mt-5">2021 &copy; Patroli Keamanan Siswa</p>
    <p class="text-center">Powered by <a href="https://blog.destroysquad.com/">Destroysquad.com</a></p>
  </div>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>