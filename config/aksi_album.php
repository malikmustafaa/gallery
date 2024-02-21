<?php
session_start();
include 'connect.php';

if (isset($_POST['tambah'])) {
  $namaalbum = $_POST['NamaAlbum'];
  $deskripsi = $_POST['Deskripsi'];
  $tanggal = date('Y-m-d');
  $userid = $_SESSION['UserID'];

  $sql = mysqli_query($conn, "INSERT INTO album VALUES('', '$namaalbum', '$deskripsi', '$tanggal', '$userid')");

  echo "<script>
  alert('Data berhasil disimpan');
  location.href='../album.php'
  </script>
  ";
}

if (isset($_POST['edit'])) {
  $albumid = $_POST['AlbumID'];
  $namaalbum = $_POST['NamaAlbum'];
  $deskripsi = $_POST['Deskripsi'];
  $tanggal = date('Y-m-d');
  $userid = $_SESSION['UserID'];

  $sql = mysqli_query($conn, "UPDATE album SET NamaAlbum='$namaalbum', Deskripsi='$deskripsi', TanggalDiBuat='$tanggal' WHERE AlbumID='$albumid'");

  echo "<script>
  alert('Data berhasil diperbarui');
  location.href='../album.php'
  </script>
  ";
}

if (isset($_POST['hapus'])) {
  $albumid = $_POST['AlbumID'];

  $sql = mysqli_query($conn, "DELETE FROM album WHERE AlbumID='$albumid'");

  echo "<script>
  alert('Data berhasil dihapus');
  location.href='../album.php'
  </script>
  ";
}

?>