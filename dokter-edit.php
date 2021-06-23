<?php
  if (!isset($_GET['id']) || $_GET['id'] == "") {
    header("location: ?page=dokter");
  }else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM dokter WHERE id='$id'";
    $data_dokter = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  }
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ubah Dokter</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <form method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username.." value="<?= $data_dokter['username'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="Password.." value="<?= $data_dokter['password'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Dokter</label>
              <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Nama.." value="<?= $data_dokter['nama'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Pengalaman (Tahun)</label>
              <input type="number" class="form-control" name="pengalaman" id="exampleInputPassword1" placeholder="Pengalaman.." value="<?= $data_dokter['pengalaman'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Harga</label>
              <input type="number" class="form-control" name="harga" id="exampleInputPassword1" placeholder="Harga.." value="<?= $data_dokter['harga'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Foto Diri <a href="../chat/gambar/<?= $data_dokter['gambar'] ?>" target="_blank"><?= $data_dokter['gambar'] ?></a> </label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="foto" id="exampleInputFile" accept="image/*">
                  <label class="custom-file-label" for="exampleInputFile">Ganti Gambar..</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Unggah</span>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
          </div>
        </form>
        <?php
          if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $nama = $_POST['nama'];
            $pengalaman = $_POST['pengalaman'];
            $harga = $_POST['harga'];

            if ($_FILES['gambar_obat']['name'] != "") {
              $ekstensi = explode(".",$_FILES['foto']['name']);
              $ekstensi = $ekstensi[1];
              $filename = $username.".".$ekstensi;
              $file_tmp = $_FILES['foto']['tmp_name'];

              //memindahkan kedalam folder
              $folder = '../chat/gambar/';
              $sql = "UPDATE `dokter` SET `username`='$username',`password`='$password',`nama`='$nama',`pengalaman`='$pengalaman',`harga`='$harga',`gambar`='$filename' WHERE id='$id'";
            }else {
              $sql = "UPDATE `dokter` SET `username`='$username',`password`='$password',`nama`='$nama',`pengalaman`='$pengalaman',`harga`='$harga' WHERE id='$id'";
            }

            if (mysqli_query($conn,$sql)) {
              if (isset($filename)) {
                if (move_uploaded_file($file_tmp, $folder.$filename)) {
                  echo "<script>alert('Berhasil Memperbarui Data');location.replace('?page=dokter');</script>";
                }else {
                  echo "<script>alert('Gagal Memperbarui Data Gambar! Hubungi Admin!');</script>";
                }
              }else {
                echo "<script>alert('Berhasil Memperbarui Data');location.replace('?page=dokter');</script>";
              }
            }else {
              echo "<script>alert('Gagal Memperbarui Data Gambar! Hubungi Admin!');</script>";
            }

          }
        ?>
      </div>
    </div>
  </section>
</div>
