<?php
session_start();
require_once 'query/query.php';
if (isset($_POST['submit'])) {
  require_once 'query/query.php';
  $username = $_POST['username'];
  $pass = $_POST['pass'];
  $login = new login($username, $pass);
  $cek = mysqli_num_rows($login->login());
  if ($cek === 1) {
    $row = mysqli_fetch_assoc($login->login());
    if ($i = (password_verify($pass, $row['password']))) {
      $_SESSION["id"] = $row["id"];
      $_SESSION['login'] = true;
      header("Location: index.php");
      exit;
    }
  }
  $eror = true;
}



?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>LOGIN ADMIN!</title>
</head>

<body style="background-color:#eaeaea;">
  <div class="p-5" style="position: absolute; left: 50%; top:50%; transform:translate(-50%,-50%); background-color:white;padding: 45px;">
    <form method="post" action="">
      <div class="form-group">
        <h3 class="text-center">Login Admin!</h3>
        <?php if (isset($eror)) : ?>
          <p class="text-center eror" style="color: red; font-style: italic;">Username / Password Salah</p>
        <?php endif; ?>
        <label for="exampleInputEmail1">username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="username" name="username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
      </div>
      <input type="submit" name="submit" id="signin" class="btn btn-primary" value="Log in" />
    </form>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>