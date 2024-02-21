<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar</title>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <div class="col center d-flex justify-content-center">
      <div class="login-container mt-5">
        <h2 class="text-center">Selamat datang</h2>

        <div class="card p-3" style="width: 24rem;">
        <form action="config/aksi_register.php" method="POST">
          <div class="mb-3">
            <input type="email" class="form-control" name="Email" placeholder="Email Address" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="NamaLengkap" placeholder="Nama Lengkap" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="Username" placeholder="Username" required>
           </div>
          <div class="mb-3">
            <input type="password" class="form-control" name="Password" placeholder="Password" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="Alamat" placeholder="Alamat" required>
          </div>
          <div class="mb-3">
            Sudah punya akun?
            <a href="login.php" class="">Masuk</a>
          </div>
          
          <div class="row mx-1">
            <button type="submit" class="btn btn-success">Daftar</button>
          </div>
        </form>
        </div>
        

      </div>
    </div>
  </div>

</body>

</html>
