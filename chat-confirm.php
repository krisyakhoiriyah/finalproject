<?php
  session_start();
  require '../koneksi.php';
  if (!isset($_SESSION['login'])) {
    $_SESSION['back'] = "chat/chat-confirm.php";
    header("location: ../login.php");
  }
  if (!isset($_GET['id']) || $_GET['id'] == "") {
    header("location: index.php");
  }else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM dokter WHERE id='$id'";
    $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../dist/css/style.css">
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
      <?php if (isset($_SESSION['login'])): ?>
        <a href="../logout.php" class="float-start btn btn-danger btn-login">Logout</a>
      <?php else: ?>
        <a href="../login.php" class="float-start btn btn-danger btn-login">Login</a>
      <?php endif; ?>
    </div>
    <div class="main-chat-confirm">
      <div class="row">
        <div class="col-12 mb-5">
          <div class="confirm-chat mx-auto" id="">
            <center>
              <h1>METODE PEMBAYARAN</h1>
            </center>
            <br>
            <hr style="color: black">
            <input type="radio" name="payment" value="kypay" class="payment-radio" checked>
            <label class="payment-text">KY-Pay <span>(<?= rupiah($result['harga']) ?>)</span> </label>
            <hr style="color: black">
            <br>
            <form action="" method="post">
              <input type="hidden" name="bayar" value="1">
              <button class="btn btn-chat w-100" type="submit" name="button">Bayar</button>
            </form>
            <?php
              if (isset($_POST['bayar'])) {
                $me = $_SESSION['login'];
                $start = date("Y/m/d H:i:s", strtotime("now"));
                $end = date("Y/m/d H:i:s", strtotime("+30 minutes"));
                $sql = "INSERT INTO `session`(`dokter`, `user`, `started`, `end`) VALUES ('$id','$me','$start','$end')";
                if (mysqli_query($conn,$sql)) {
                  $sql = "UPDATE `dokter` SET `status`='1' WHERE id='$id'";
                  mysqli_query($conn,$sql);
                  $sql = "SELECT * FROM `session` WHERE user='$me' ORDER BY id DESC LIMIT 1";
                  $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
                  $_SESSION['session'] = $result['id'];
                  header("location: chat-app.php");
                }

              }
            ?>
          </div>
        </div>
      </div>
      <br><br><br>
      <footer>
        &copy; KY-Med. All Right Reserved.
      </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../dist/js/screen.js"></script>
    <script type="text/javascript">
      $('#kurangJumlah').on("click", function(){
        var jumlahBarang = $('#jumlahBarang').val();
        jumlahBarang = parseInt(jumlahBarang);
        if (jumlahBarang > 1) {
          $('#jumlahBarang').val(jumlahBarang-1);
          $('#jmlBarang').text(jumlahBarang-1);
        }
      });
      $('#tambahJumlah').on("click", function(){
        var jumlahBarang = $('#jumlahBarang').val();
        jumlahBarang = parseInt(jumlahBarang);
        $('#jumlahBarang').val(jumlahBarang+1);
        $('#jmlBarang').text(jumlahBarang+1);
      });
    </script>
  </body>
</html>
