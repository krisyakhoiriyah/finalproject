<?php
  session_start();
  require '../koneksi.php';
  if (!isset($_GET['id']) || $_GET['id'] == "") {
    header("location: index.php");
  }else {
    $id = $_GET['id'];
    $list_obat = mysqli_query($conn, "SELECT * FROM barang WHERE id_kategori='$id'");
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
    <div class="main-apotek mx-auto">
      <div class="row">
        <?php foreach ($list_obat as $o): ?>
          <div class="col-6 mb-5">
            <div class="apotek-barang mx-auto">
              <img class="apotek-barang-img" src="gambar/<?= $o['gambar'] ?>" alt="">
              <center>
                <span class="apotek-barang-nama"><?= $o['nama'] ?></span>
                <br>
                <span class="apotek-barang-harga"><?= rupiah($o['harga']) ?></span>
                <br>
                <a href="confirm.php?id=<?= $o['id'] ?>" class="btn btn-danger btn-beli">Tambah</a>
              </center>
            </div>
          </div>
        <?php endforeach; ?>
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
      $(document).ready(function() {
        $('.btn-beli').on("click", function() {
          // console.log($(this).closest('.apotek-barang-nama'));
          // location.replace('category.php');
        });

      });
      // var keranjang = [];
      // function beli(id){
      //
      // }
    </script>
  </body>
</html>
