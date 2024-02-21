<?php
include "config/connect.php";
session_start();
@$userid = $_SESSION['UserID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fontawesome/css/all.min.css" />
  <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.css"></script>
  <title>Website Gallery Foto</title>
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
          <!-- <a href="home.php" class="">Home</a> -->
          <a href="album.php" class="nav-link">Album</a>
         
          <a href="foto.php" class="nav-link">Foto</a>
        </div>
        <?php
        if (isset($_SESSION['login'])) {
          ?>
          <a href="config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
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
    $album = mysqli_query($conn, "SELECT * FROM album WHERE UserID='$userid'");
    while ($row = mysqli_fetch_array($album)) { ?>
      <a href="index.php?albumid=<?php echo $row['AlbumID']; ?>" class="btn btn-outline-success">
        <?php echo $row['NamaAlbum'] ?>
      </a>
    <?php } ?>
    <div class="row">
      
      <?php
      $query = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto
      .UserID=user.UserID INNER JOIN album ON foto.AlbumID=album.AlbumID");
      while ($data = mysqli_fetch_array($query)) { ?>
        <div class="col-md-3">
          <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['FotoID'] ?>">
            <div class="card">
              <img src="assets/img/<?php echo $data['LokasiFile'] ?>" class="card-img-top object-fit-cover rounded"
                style="height: 12rem;" title="<?php echo $data['JudulFoto'] ?>">
              <div class="card-footer text-center">
                <?php
                $fotoid = $data['FotoID'];
                $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$fotoid' AND UserID='$userid'");
                if (mysqli_num_rows($ceksuka) == 1) { ?>
                  <a href="config/proses_like.php?fotoid=<?php echo $data['FotoID'] ?>" type="submit" name="batalsuka"><i class="fa fa-heart m-1"></i></a>
                <?php } else { ?>
                  <a href="config/proses_like.php?fotoid=<?php echo $data['FotoID'] ?>" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>
                <?php }
                $like = mysqli_query($conn, "SELECT * FROM likefoto WHERE FotoID='$fotoid'");
                echo mysqli_num_rows($like). ' Suka';
                  ?>
                <a href="" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['FotoID'] ?>"  ><i class="fa-regular fa-comment"></i></a>
                <?php
                $jmlkomen = mysqli_query($conn, "SELECT * FROM komentarfoto WHERE FotoID='$fotoid'");
                echo mysqli_num_rows($jmlkomen). ' Komentar';
                ?>
              </div>
            </div>
          </a>
          <div class="modal fade" id="komentar<?php echo $data['FotoID'] ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-8">
                      <img src="assets/img/<?php echo $data['LokasiFile'] ?>" class="card-img-top object-fit-cover rounded" title="<?php echo $data['JudulFoto'] ?>">
                    </div>
                    <div class="col-md-4">
                      <div class="m-2">
                        <div class="overflow-auto">
                          <div class="sticky-top">
                            <strong><?php echo $data['JudulFoto'] ?></strong> <br>
                            <span class="badge bg-secondary">
                              <?php echo $data['NamaLengkap'] ?>
                            </span>
                            <span class="badge bg-secondary">
                              <?php echo $data['TanggalUnggah'] ?>
                            </span>
                            <span class="badge bg-success">
                              <?php echo $data['NamaAlbum'] ?>
                            </span>
                          </div>
                          <hr>
                          <p align="left">
                            <?php echo $data['DeskripsiFoto'] ?>
                          </p>
                          <hr>
                          <?php
                          $fotoid = $data['FotoID'];
                          $komentar = mysqli_query($conn, "SELECT * FROM
                           komentarfoto INNER JOIN user ON komentarfoto.UserID=
                           user.UserID WHERE komentarfoto.FotoID='$fotoid'");
                          while($row = mysqli_fetch_array($komentar)) {
                          ?>
                          <p align="left">
                            <strong><?php echo $row['NamaLengkap'] ?></strong>
                            <?php echo $row['IsiKomentar'] ?>
                          </p>
                          <?php } ?>
                          <hr>
                          <div class="sticky-bottom">
                            <form action="config/proses_komentar.php" method="POST">
                              <div class="input-group">
                                <input type="hidden" name="FotoID" value="<?php echo $data['FotoID'] ?>">
                                <input type="text" name="IsiKomentar" class="form-control" placeholder="Tambah Komentar">
                                <div class="input-group-prepend">
                                  <button type="submit" name="kirimkomentar" class="btn btn-outline-success">Kirim</button>
                                </div>                               
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK 2024 | Malik Mustafa Arif</p>
  </footer>

  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>