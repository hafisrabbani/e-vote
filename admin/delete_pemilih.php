<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
$id = $_GET['id'];
if (!is_numeric($id)) {
  echo "NO SQLI INJECTION HERE";
  exit;
}
require_once 'query/conn.php';
$conn = new koneksi();
$data = mysqli_query($conn->conn(), "DELETE FROM pemilih WHERE id='$id'");


if ($data === true) {
  echo "<script>alert('Pemilih Berhasil Dihapus');window.location.replace('user.php');</script>";
  echo "<script></script>";
} else {
  echo "<script>alert('Pemilih Gagal Dihapus');window.location.replace('user.php');</script>";
  echo "<script></script>";
}
