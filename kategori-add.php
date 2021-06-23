<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Kategori</h1>
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
              <label for="exampleInputEmail1">Nama Kategori</label>
              <input type="text" class="form-control" name="nama_kategori" id="exampleInputEmail1" placeholder="Nama Obat..">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
        <?php
          if (isset($_POST['nama_kategori'])) {
            $nama_kategori = $_POST['nama_kategori'];

            $sql = "INSERT INTO `kategori`(`nama_kategori`, `status`) VALUES ('$nama_kategori','1')";
            if (mysqli_query($conn,$sql)) {
              echo "<script>alert('Input Berhasil');location.replace('?page=kategori');</script>";
            }else {
              echo "<script>alert('Input Gagal! Hubungi Admin!');</script>";
            }

          }
        ?>
      </div>
    </div>
  </section>
</div>
