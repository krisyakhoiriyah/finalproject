<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Dokter</h1>
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
              <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username..">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="Password..">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Dokter</label>
              <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Nama..">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Pengalaman (Tahun)</label>
              <input type="number" class="form-control" name="pengalaman" id="exampleInputPassword1" placeholder="Pengalaman..">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Harga</label>
              <input type="number" class="form-control" name="harga" id="exampleInputPassword1" placeholder="Harga..">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Foto Diri</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="foto" id="exampleInputFile" accept="image/*">
                  <label class="custom-file-label" for="exampleInputFile">Pilih Gambar..</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Unggah</span>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
        <?php
          if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $nama = $_POST['nama'];
            $pengalaman = $_POST['pengalaman'];
            $harga = $_POST['harga'];

            $ekstensi = explode(".",$_FILES['foto']['name']);
            $ekstensi = $ekstensi[1];
            $filename = $username.".".$ekstensi;
            $file_tmp = $_FILES['foto']['tmp_name'];

            //memindahkan kedalam folder
            $folder = '../chat/gambar/';

            $sql = "INSERT INTO `dokter`(`username`, `password`, `nama`, `pengalaman`, `harga`, `gambar`) VALUES ('$username','$password','$nama','$pengalaman','$harga','$filename')";
            if (mysqli_query($conn,$sql)) {
              if (move_uploaded_file($file_tmp, $folder.$filename)) {
                echo "<script>alert('Input Berhasil');location.replace('?page=dokter');</script>";
              }else {
                echo "<script>alert('Input Gambar Gagal! Hubungi Admin!');</script>";
              }
            }else {
              echo "<script>alert('Input Gagal! Hubungi Admin!');</script>";
            }

          }
        ?>
      </div>
    </div>
  </section>
</div>
