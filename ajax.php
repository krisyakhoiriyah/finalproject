<?php
  require '../koneksi.php';
  if (isset($_POST['rupiah'])) {
    $uang = (float)$_POST['rupiah'];
    echo rupiah($uang);
  }
?>
