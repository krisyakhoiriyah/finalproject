<?php
  session_start();
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
        <div class="login">
          <form action="" method="post">
            <input type="username" name="username" class="login-username" placeholder="Username.." required>
            <input type="password" name="password" class="login-password" placeholder="Password.." required>
            <button type="submit" name="button" class="btn btn-register">Login</button>
            <!-- <input type="submit" name="login" class="btn btn-register" value="Login"> -->
          </form>
          <?php
            if (isset($_POST['username'])) {
              $username = $_POST['username'];
              $password = $_POST['password'];
              $sql = "SELECT * FROM users WHERE username='$username'";
              $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
              if ($password == $result['password'] && $username != "") {
                $_SESSION['login'] = $result['id'];
                echo "<script>alert('Login Berhasil');</script>";
                if (isset($_SESSION['back'])) {
                  $back = $_SESSION['back'];
                  echo "<script>location.replace('$back')</script>";
                }else {
                  echo "<script>location.replace('index.php')</script>";
                }
              }else {
                echo "<script>alert('Username / Password Salah')</script>";
              }
            }
          ?>
        </div>
      </center>
      <center>
        <a href="register.php" class="btn btn-register">Register</a>
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
