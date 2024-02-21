<?php
session_start();
include "connect.php";
if ($_SESSION['login'] != 'Username') {
  echo "<script>
  alert('anda belum login');
  location.href='../login.php';
  </script>";
}
$fotoid = $_POST['FotoID'];
$userid = $_SESSION['UserID'];
$isikomentar = $_POST['IsiKomentar'];
$tanggalkomentar = date('Y-m-d');

$query = mysqli_query($conn, "INSERT INTO komentarfoto VALUES('', '$fotoid', '$userid', '$isikomentar', '$tanggalkomentar')");

echo "<script>
location.href='../index.php';
</script>";
?>