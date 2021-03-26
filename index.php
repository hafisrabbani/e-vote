<?php
session_start();
require_once 'admin/query/query.php';
if (isset($_POST['submit'])) {
  $nisn = $_POST['nisn'];
  $pass = $_POST['pass'];
  $login = new login_user($nisn);
  $cek = mysqli_num_rows($login->login());
  if ($cek === 1) {
    $row = mysqli_fetch_assoc($login->login());
    $i = $row["password"];
    $status = $row["status_pemilih"];
    if ($i === $pass) {
      if ($status === "1") {
        header("Location: thanks.php");
        exit;
      }
      header("Location: display.php");
      $_SESSION['login_user'] = true;
      $_SESSION['id'] = $row["id"];
      exit;
    }
  }
  $eror = true;
}



?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/1d954ea888.js" crossorigin="anonymous"></script>
  <title>Login Pemilih</title>
  <style>
    .eror {
      animation: eror 0.2s;
    }

    @keyframes eror {
      0% {
        -ms-transform: rotate(-4deg);
        transform: rotate(-4deg);
      }

      25% {
        -ms-transform: rotate(-4deg);
        transform: rotate(-4deg);
      }

      50% {
        -ms-transform: rotate(4deg);
        transform: rotate(4deg);
      }

      75% {
        -ms-transform: rotate(-4deg);
        transform: rotate(-4deg);
      }

      100% {
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
      }
    }
  </style>
  </style>
</head>

<body style="background-color:#eaeaea;">
  <div style="position:absolute; left:50%; top:50%; transform:translate(-50%,-50%); background-color:white; padding:40px; border-radius:15px; width:450px;   box-shadow:
  0 2.8px 2.2px rgba(0, 0, 0, 0.034),
  0 6.7px 5.3px rgba(0, 0, 0, 0.048),
  0 12.5px 10px rgba(0, 0, 0, 0.06),
  0 22.3px 17.9px rgba(0, 0, 0, 0.072),
  0 41.8px 33.4px rgba(0, 0, 0, 0.086),
  0 100px 80px rgba(0, 0, 0, 0.12)
;" class="text-center">
    <img src="https://logowik.com/content/uploads/images/visual-studio-code7642.jpg" style="height:200px; width:250px;">
    <h3 class="text-center">Login Voting!</h3>
    <?php if (isset($eror)) : ?>
      <p class="eror" style="color: red; font-style: italic;">NISN / Password Salah</p>
    <?php endif; ?>
    <form method="post" action="">
      <div class="form-group">
        <label for="nisn">Username</label>
        <input type="text" class="form-control" id="nisn" placeholder="Username" name="nisn" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="pass" required>
      </div>
      <input type="submit" name="submit" value="login" class="btn btn-primary mt-4 mb-4">
      <br>
      <small class="text-center">2021 &copy; Ade Hafis Rabbani</small>
    </form>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>