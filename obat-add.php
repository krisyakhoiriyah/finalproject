<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Obat</h1>
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
              <label for="exampleInputEmail1">Nama Obat</label>
              <input type="text" class="form-control" name="nama_obat" id="exampleInputEmail1" placeholder="Nama Obat..">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Kategori</label>
              <select class="form-control select2" name="kategori">
                <?php
                  $data_kategori = mysqli_query($conn, "SELECT * FROM kategori WHERE status='1'");
                  foreach ($data_kategori as $d) {
                ?>
                  <option value="<?= $d['id'] ?>"><?= $d['nama_kategori'] ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Harga Obat</label>
              <input type="number" class="form-control" name="harga_obat" id="exampleInputPassword1" placeholder="Harga Obat..">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Gambar Obat</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="gambar_obat" id="exampleInputFile" accept="image/*">
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
          if (isset($_POST['nama_obat'])) {
            $nama_obat = $_POST['nama_obat'];
            $harga_obat = $_POST['harga_obat'];
            $kategori = $_POST['kategori'];

            $ekstensi = explode(".",$_FILES['gambar_obat']['name']);
            $ekstensi = $ekstensi[1];
            $filename = $nama_obat.".".$ekstensi;
            $file_tmp = $_FILES['gambar_obat']['tmp_name'];

            //memindahkan kedalam folder
            $folder = '../apotek/gambar/';

            $sql = "INSERT INTO `barang`(`nama`, `id_kategori`, `harga`, `gambar`, `status`) VALUES ('$nama_obat','$kategori','$harga_obat','$filename','1')";
            if (mysqli_query($conn,$sql)) {
              if (move_uploaded_file($file_tmp, $folder.$filename)) {
                echo "<script>alert('Input Berhasil');location.replace('?page=obat');</script>";
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
