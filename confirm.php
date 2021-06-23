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
    $data_obat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM barang WHERE id='$id'"));
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
            <div class="row mt-2">
              <div class="col-4 apotek-confirm-img" style="background-image: url('gambar/<?= $data_obat['gambar'] ?>');"></div>
              <div class="col-8 text-left p-5 text-dark">
                <h1 class="apotek-confirm-title"><?= $data_obat['nama'] ?></h1>
                <p class="h3"></p>
              </div>
            </div>
            <hr style="color: black">
            <br>
            <label class="kode-promo">JUMLAH </label>
            <button type="button" class="float-end input-promo-enter btn" id="tambahJumlah" name="button"><i class="fas fa-plus"></i></button>
            <input type="number" name="promo" value="1" class="float-end input-jumlah" id="jumlahBarang" min="1">
            <button type="button" class="float-end input-promo-enter btn" id="kurangJumlah" name="button"><i class="fas fa-minus"></i></button>
            <br><br>
            <hr style="color: black">
            <br><br>
            <!-- <label class="kode-promo">KODE PROMO</label>
            <br><br>
            <input type="text" name="promo" value="" class="input-promo" placeholder="Masukkan Kode Promo">
            <button type="button" class="input-promo-enter btn" name="button"><i class="fas fa-arrow-right"></i></button>
            <br><br><br><br>
            <hr style="color: black">
            <br><br> -->
            <label class="kode-promo">DETAIL</label>
            <br><br>
            <table class="w-100">
              <tr>
                <td>Demacolin 1 Strip x <span id="jmlBarang">1</span> </td>
                <td class="ms-4" id="totba"><?= rupiah($data_obat['harga']) ?></td>
              </tr>
              <!-- <tr>
                <td>Diskon</td>
                <td>Rp 10.000</td>
              </tr> -->
              <tr>
                <td>Total</td>
                <td id="total"><?= rupiah($data_obat['harga']) ?></td>
              </tr>
            </table>
            <br><br>
            <hr style="color: black">
            <form class="" action="apotek-confirm.php" method="post">
              <input type="hidden" name="jumlah" value="<?= $data_obat['harga'] ?>" id="jumlah">
              <button class="btn btn-chat w-100" type="submit" name="button">Bayar</button>
            </form>
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
      var harga = <?= $data_obat['harga'] ?>;
      $('#kurangJumlah').on("click", function(){
        var jumlahBarang = $('#jumlahBarang').val();
        jumlahBarang = parseInt(jumlahBarang);
        if (jumlahBarang > 1) {
          $('#jumlahBarang').val(jumlahBarang-1);
          $('#jmlBarang').text(jumlahBarang-1);
          rupiah = jumlahBarang-1;
          rupiah = harga * rupiah;
          $.ajax({
            url:'ajax.php',
            method : "POST",
            data: {rupiah : rupiah},
            dataType:"text",
            success:function(html){
              $("#totba").text(html);
              $("#total").text(html);
              $("#jumlah").val(rupiah);
            }
          });
        }
      });
      $('#tambahJumlah').on("click", function(){
        var jumlahBarang = $('#jumlahBarang').val();
        jumlahBarang = parseInt(jumlahBarang);
        $('#jumlahBarang').val(jumlahBarang+1);
        $('#jmlBarang').text(jumlahBarang+1);
        rupiah = jumlahBarang+1;
        rupiah = harga * rupiah;
        $.ajax({
          url:'ajax.php',
          method : "POST",
          data: {rupiah : rupiah},
          dataType:"text",
          success:function(html){
            $("#totba").text(html);
            $("#total").text(html);
            $("#jumlah").val(rupiah);
          }
        });
      });
    </script>
  </body>
</html>
