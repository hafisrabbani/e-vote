<?php
session_start();
$id_user = $_SESSION["id"];
if (!isset($_SESSION["login_user"])) {
  header("Location: index.php");
}
$id = $_GET["id"];
if (empty($_GET)) {
  header("Location: display.php");
  exit;
}
if (!is_numeric($id)) {
  echo "No Sqli Injection";
  die;
}
require_once 'admin/query/conn.php';
$conn = new koneksi();
$count = mysqli_query($conn->conn(), "SELECT * FROM kandidat WHERE id = '$id'");
foreach ($count as $key) {
  $i = $key["perolehan"];
}
$tambah = $i + "1";
$suara = mysqli_query($conn->conn(), "UPDATE kandidat SET perolehan = '$tambah' WHERE id = '$id'");
$hak = mysqli_query($conn->conn(), "UPDATE pemilih SET status_pemilih = '1' WHERE id = '$id_user'");
header("Location: thanks.php");
