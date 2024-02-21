<?php
session_start();
$userid = $_SESSION['UserID'];
include "config/connect.php";
if ($_SESSION['login'] != 'Username') {
  echo "<script>
  alert('anda belum login');
  location.href='login.php';
  </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fontawesome/css/all.min.css" />
  <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.css"></script>
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="index.php">Website Gallery Foto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mt-2" id="navbarNav">
        <div class="navbar-nav me-auto">
          <a href="home.php" class="nav-link">Home</a>
          <a href="album.php" class="nav-link">Album</a>
          <a href="foto.php" class="nav-link">Foto</a>
        </div>
        <?php
        if (isset($_SESSION['login'])) {
          ?>
          <a href="config/aksi_logout.php" class="btn btn-outline-danger m-1">Logout</a>
        <?php } else { ?>
          <a href="register.php" class="btn btn-outline-success m-1">Daftar</a>
          <a href="login.php" class="btn btn-outline-success m-1">Login</a>
        <?php } ?>
      </div>
    </div>
  </nav>

  <div class="container mt-3">
    Album :
    <?php
    $fotoid = $data['fotoid'];  
    $album = mysqli_query($conn, "SELECT * FROM album WHERE UserID='$userid'");
    while ($row = mysqli_fetch_array($album)) { ?>
      <a href="home.php?albumid=<?php echo $row['AlbumID']; ?>" class="btn btn-outline-success">
        <?php echo $row['NamaAlbum'] ?>
      </a>
    <?php } ?>
    <div class="row">
      <?php
      if (isset($_GET['albumid'])) {
        $albumid = $_GET['albumid'];
        $query = mysqli_query($conn, "SELECT * FROM foto WHERE UserID='$userid' AND AlbumID='$albumid'");
        while ($data = mysqli_fetch_array($query)) { ?>
          <div class="col-md-3 mt-2">
            <div class="card">
              <img src="assets/img/<?php echo $data['LokasiFile'] ?>" class="card-img-top object-fit-cover rounded"
                style="height: 12rem;" title="<?php echo $data['JudulFoto'] ?>">
              <div class="card-footer text-center">
                <?php
                $fotoid = $data['FotoID'];
                $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$fotoid' AND UserID='$userid'");
                if (mysqli_num_rows($ceksuka) == 1) { ?>
                  <a href="config/proses_like.php?fotoid=<?php echo $data['FotoID'] ?>" type="submit" name="batalsuka"><i
                      class="fa fa-heart m-1"></i></a>
                <?php } else { ?>
                  <a href="config/proses_like.php?fotoid=<?php echo $data['FotoID'] ?>" type="submit" name="suka"><i
                      class="fa-regular fa-heart m-1"></i></a>
                <?php }
                $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$fotoid'");
                echo mysqli_num_rows($like) . ' Suka'
                  ?>
                <a href=""><i class="fa-regular fa-comment m-1"></i></a>2 Komentar
              </div>
            </div>
            </a>
          </div>
        <?php }
      } else { 
      $query = mysqli_query($conn, "SELECT * FROM foto WHERE UserID='$userid'");
      while ($data = mysqli_fetch_array($query)) { ?>
        <div class="col-md-3 mt-2">
          <div class="card">
            <img src="assets/img/<?php echo $data['LokasiFile'] ?>" class="card-img-top object-fit-cover rounded"
              style="height: 12rem;" title="<?php echo $data['JudulFoto'] ?>">
            <div class="card-footer text-center">
              <?php
              $fotoid = $data['FotoID'];
              $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$fotoid' AND UserID='$userid'");
              if (mysqli_num_rows($ceksuka) == 1) { ?>
                <a href="config/proses_like.php?fotoid=<?php echo $data['FotoID'] ?>" type="submit" name="batalsuka"><i
                    class="fa fa-heart m-1"></i></a>
              <?php } else { ?>
                <a href="config/proses_like.php?fotoid=<?php echo $data['FotoID'] ?>" type="submit" name="suka"><i
                    class="fa-regular fa-heart m-1"></i></a>
              <?php }
              $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$fotoid'");
              echo mysqli_num_rows($like) . ' Suka'
                ?>
              <a href=""><i class="fa-regular fa-comment m-1"></i></a>2 Komentar
            </div>
          </div>
          </a>
        </div>
      <?php } } ?>
    </div>
  </div>


  <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK 2024 | Malik Mustafa Arif</p>
  </footer>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>