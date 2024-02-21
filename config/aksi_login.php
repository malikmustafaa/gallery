<?php
session_start();
include "connect.php";

$username = $_POST['Username'];
$password = md5($_POST['Password']);

$sql = mysqli_query($conn, "SELECT * FROM user WHERE Username='$username' AND Password='$password'");
$cek = mysqli_num_rows($sql);

if ($cek > 0) {
  $data = mysqli_fetch_array($sql);
  $_SESSION['Username'] = $data['Username'];
  $_SESSION['UserID'] = $data['UserID'];
  $_SESSION['login'] = 'Username';
  echo "<script>
    alert('Login berhasil');
    location.href='../index.php';
    </script>";
} else {
  echo "<script>
    alert('gagal login!');
    location.href='../login.php';
    </script>";
}

?>