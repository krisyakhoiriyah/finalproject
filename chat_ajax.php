<?php
  require "../koneksi.php";
  if (isset($_POST['text'])) {
    $msg = $_POST['text'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $session = $_POST['session'];
    if (mysqli_query($conn, "INSERT INTO `chat`(`id_session`, `msg`, `sender`, `recipient`) VALUES ('$session','$msg','$from','$to')")) {
      echo "sukses";
    }else {

    }
  }
  if (isset($_POST['check_time'])) {
    $session = $_POST['session'];
    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM session WHERE id='$session'"));
    $end = $data['end'];
    $now = date("Y-m-d H:i:s");
    if ($now >= $end) {
        echo 'stop';
    }
  }
  if (isset($_POST['get_chat'])) {
    $user = $_POST['user'];
    $dokter = $_POST['dokter'];
    $data_dokter = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM dokter WHERE id='$dokter'"));
    $data_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id='$user'"));
    $session = $_POST['session'];
    $data = mysqli_query($conn, "SELECT * FROM chat WHERE id_session='$session'");
    $isi = "<div class='row'>";
    foreach ($data as $d) {
      if ($d['sender'] == $dokter) {
        $isi .= "
        <div class='col-12'>
          <div class='chat-bubble-dokter float-start'>
            <p>
              <b>dr. ".$data_dokter['nama']."</b>
              <br>
              ".$d['msg']."
            </p>
          </div>
        </div>
        <br>
        ";
      }elseif ($d['sender'] == $user) {
        $isi .= "
        <div class='col-12'>
          <div class='chat-bubble-me float-end'>
            <p>
              <b>".$data_user['username']."</b>
              <br>
              ".$d['msg']."
            </p>
          </div>
        </div>
        <br>
        ";
      }
    }
    $isi .= "</div>";
    echo "$isi";
  }
?>
