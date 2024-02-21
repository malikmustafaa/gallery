<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk</title>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <div class="col center d-flex justify-content-center">
      <div class="login-container mt-5">
        <h2 class="text-center">Selamat datang</h2>
        
        <div class="card p-3" style="width: 24rem;">
          <form action="config/aksi_login.php" method="POST">
            <div class="mb-3">
              <label for="InputEmail1" class="form-label">Username</label>
              <input type="text" name="Username" class="form-control" id="InputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
              <label for="InputPassword1" class="form-label">Password</label>
              <input type="password" name="Password" class="form-control" id="InputPassword1" required>
            </div>
            <div class="mb-3">
              Belum punya akun?
              <a href="register.php" class="">Daftar</a>
            </div>
            <div class="row mx-1">
              <button type="submit" class="btn btn-success">Masuk</button>
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>

</body>

</html>