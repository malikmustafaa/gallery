<?php
session_start();
include "connect.php";
if ($_SESSION['login'] != 'Username') {
  echo "<script>
  alert('anda belum login');
  location.href='../login.php';
  </script>";
}
$fotoid = $_GET['fotoid'];
$userid = $_SESSION['UserID'];

$ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$fotoid' AND UserID='$userid'");

if(isset($_SERVER['HTTP_REFERER'])) {
  $previous = $_SERVER['HTTP_REFERER'];
}

if (mysqli_num_rows($ceksuka) == 1) {
  while ($row = mysqli_fetch_array($ceksuka)) {
    $likeid = $row['LikeID'];
    $query = mysqli_query($conn, "DELETE FROM likefoto WHERE LikeID='$likeid'");
    echo "<script>
    location.href='$previous';
    </script>";
  }
} else {
  $tanggallike = date('Y-m-d');
  $query = mysqli_query($conn, "INSERT INTO likefoto VALUES('', '$fotoid', '$userid', '$tanggallike')");

  echo "<script>
  location.href='$previous';
  </script>";
}


?>