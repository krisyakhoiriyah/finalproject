<?php
  if (!isset($_GET['id']) || $_GET['id'] == "") {
    header("location: ?page=kategori");
  }else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM kategori WHERE id='$id'";
    $data_kategori = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  }
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ubah Kategori</h1>
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
              <input type="text" class="form-control" name="nama_kategori" id="exampleInputEmail1" placeholder="Nama Kategori.." value="<?= $data_kategori['nama_kategori'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
          </div>
        </form>
        <?php
          if (isset($_POST['nama_kategori'])) {
            $nama_kategori = $_POST['nama_kategori'];

            $sql = "UPDATE `kategori` SET `nama_kategori`='$nama_kategori' WHERE id='$id'";
            if (mysqli_query($conn,$sql)) {
              echo "<script>alert('Berhasil Mengubah Data!');location.replace('?page=kategori');</script>";
            }else {
              echo "<script>alert('Gagal Mengubah Data!');</script>";
            }

          }
        ?>
      </div>
    </div>
  </section>
</div>
