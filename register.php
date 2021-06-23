<?php
  require 'koneksi.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="dist/css/style.css">
  </head>
  <body>
    <div class="row bg-dark blocked">
        <div class="col-12 d-flex justify-content-center text-center">
            <img src="" alt="">
            <h1 class="mx-auto my-auto display-1 text-white"><b>Tolong Buka di Smartphone</b></h1>
        </div>
    </div>
    <div class="navigasi">
      <a href="../index.php"><div class="float-start logo text-center text-white">KY</div></a>
      <!-- <a href="../login.php" class="float-start btn btn-danger btn-login">Login</a> -->
    </div>
    <div class="main container">
      <center>
        <div class="register">
          <form action="" method="post">
            <input type="username" name="username" class="login-username" placeholder="Username.." required>
            <input type="password" name="password" class="login-password" placeholder="Password.." required>
            <input type="password" name="repassword" class="login-password" placeholder="Masukkan Ulang Password.." required>
            <input type="submit" name="register" class="btn btn-register" value="Register">
          </form>
          <?php
            if (isset($_POST['register'])) {
              $username = $_POST['username'];
              $password = $_POST['password'];
              $repassword = $_POST['repassword'];
              if ($password == $repassword) {
                $sql = "INSERT INTO `users`(`username`, `password`, `bal`) VALUES ('$username','$password','0')";
                if (mysqli_query($conn,$sql)) {
                  echo "<script>alert('Registerasi Berhasil'); location.replace('login.php')</script>";
                }
              }else {
                echo "<script>alert('Password Anda Tidak Sama')</script>";
              }
            }
          ?>
        </div>
      </center>
      <center>
        <a href="login.php" class="btn btn-register">Login</a>
      </center>
      <footer>
        &copy; KY-Med. All Right Reserved.
      </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="dist/js/screen.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#dokter').on("click", function() {
          location.replace('chat');
        });
        $('#apotek').on("click", function() {
          location.replace('apotek');
        });
      });
    </script>
  </body>
</html>
