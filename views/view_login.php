<?php 
  require_once '../init.php';

  if( isset($_SESSION["email"]) and isset($_SESSION["username"]) ) {
    header("Location: view_article.php");
    die;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find Your Beauty</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="center">
    <h1>LOGIN</h1>
    
    <!-- FLASH MESSAGE -->
    <div class="row">
      <div class="col-md-10">
        <?php Flasher::flashLogin(); ?>
      </div>  
    </div>
    
    <form action="../controller/login_controls.php" method="POST">
      <div class="text_field">
        <input type="text" name="identifier" id="identifier" required>
        <span></span>
        <label for="identifier">Username/Email</label>
      </div>

      <div class="text_field">
        <input type="password" name="password" id="password" required>
        <span></span>
        <label for="Password">Password</label>
      </div>

      <div class="pass">Lupa Password? klik <a href="#">disini.</a></div>

      <input type="submit" name="submit" value="Login">

      <div class="signup"> Belum punya akun?
        <a href="view_register.php">Sign Up</a>
      </div>


    </form>
  </div>

<?php require_once 'templates/footer.php'; ?>