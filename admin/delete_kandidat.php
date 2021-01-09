<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login/index.php");
}
$id = $_GET['id'];
if (!is_numeric($id)) {
  echo "NO SQLI INJECTION HERE";
  exit;
}
require_once 'query/conn.php';
$conn = new koneksi();
$data = mysqli_query($conn->conn(), "DELETE FROM kandidat WHERE id='$id'");


if ($data === true) {
  echo "<script>alert('Kandidat Berhasil Dihapus');window.location.replace('kandidat.php');</script>";
  echo "<script></script>";
} else {
  echo "<script>alert('Kandidat Gagal Dihapus');window.location.replace('kandidat.php');</script>";
  echo "<script></script>";
}
