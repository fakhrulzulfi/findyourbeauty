<?php 
    if( isset($_SESSION["email"]) and isset($_SESSION["username"]) ) {
      header("Location: view_article.php");
      die;
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FIND YOUR BEAUTY</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="center mt-3">
      <h1 class="mt-2">SIGN UP</h1>
      <form action="../controller/user_controls.php?action=add" method="POST">
        <div class="row">
          <div class="col-md-12">
            <div class="text_field">
              <input type="text" name="name" id="name">
              <span></span>
              <label for="name" style="color:grey;">Masukkan Nama Anda</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="text_field">
              <input type="email" name="email" id="email" required>
              <span></span>
              <label for="Email" style="color:grey;">Masukkan Email</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="text_field">
              <input type="text" name="username" id="username" required>
              <span></span>
              <label for="username" style="color:grey;">Username</label>
            </div>
          </div>
        </div>

        <div class="text_field">
          <select name="gender" id="gender" class="custom-select">
            <option selected>- Jenis Kelamin -</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          <span></span>
        </div>

        
        <div class="text_field">
          <input type="password" name="password" id="password" required>
          <span></span>
          <label for="Password" style="color:grey;">Masukkan Password</label>
        </div>

        <div class="text_field">
          <input type="password" name="confirmPassword" id="confirmPassword" required>
          <span></span>
          <label for="confirmPassword" style="color:grey;">Confirm Password</label>
        </div>

        <input type="submit" name="submit" value="Daftar">

        <div class="signup"> 
          Sudah punya akun? <a href="view_login.php">Login</a>
        </div>


      </form>

    </div>
  </body>
</html>
