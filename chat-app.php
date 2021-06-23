<?php
  session_start();
  require '../koneksi.php';
  if (!isset($_SESSION['login'])) {
    $_SESSION['back'] = "chat/chat-confirm.php";
    header("location: ../login.php");
  }
  if (!isset($_SESSION['session']) || $_SESSION['session'] == "") {
    header("location: index.php");
  }else {
    $session = $_SESSION['session'];
    $data_session = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `session` WHERE id='$session'"));
    $id = $data_session['dokter'];
    $me = $_SESSION['login'];
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
          <div class="chat-app mx-auto" id="chat_room" style="overflow-y: hidden">
          </div>
        </div>
        <div class="col-12 input-menu mx-auto">
          <center>
            <input type="text" class="chat-input" id="input" placeholder="masukkan pesan.." name="" value="">
            <button type="button" class="btn btn-danger btn-send" id="send"><i class="fas fa-caret-right"></i></button>
          </center>
        </div>
      </div>
      <br><br><br><br><br><br>
      <footer>
        &copy; KY-Med. All Right Reserved.
      </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../dist/js/screen.js"></script>
    <script type="text/javascript">
      alert('Jangan Meninggalkan Laman Sebelum Chat Selesai.');
      var elem = document.getElementById('chat_room');
      $(document).ready(function () {
        setInterval(function () {
          $.ajax({
            type: "POST",
            url: "chat_ajax.php",
            data: {get_chat : 1, user : '<?= $me ?>', dokter : '<?= $id ?>', session : '<?= $session ?>'},
            dataType: "text",
            success: function (response) {
              $("#chat_room").empty();
              $("#chat_room").append(response);
              elem.scrollTop = elem.scrollHeight;
            }
          });
        }, 100);// function will run every 0.1 seconds
        setInterval(function () {
          $.ajax({
            type: "POST",
            url: "chat_ajax.php",
            data: {check_time : 1, session : '<?= $session ?>'},
            dataType: "text",
            success: function (response) {
              if (response == "stop") {
                alert('Waktu Berakhir.');
                location.replace('index.php?clear=<?= $session ?>');
              }
            }
          });
        }, 1000);// function will run every 0.1 seconds
        $("#send").on("click",function(){
          var input = $("#input").val();
          if (input != "") {
            $.ajax({
              url:'chat_ajax.php',
              method : "POST",
              data: {text : input, to: '<?= $id ?>', from: '<?= $me ?>', session : '<?= $session ?>'},
              dataType:"text",
              success:function(html){
                $("#input").val("");
              }
            });
          }
        });
      });

    </script>
  </body>
</html>
