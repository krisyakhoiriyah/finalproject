<?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `dokter` WHERE id='$id'";
    if (mysqli_query($conn,$sql)) {
      echo "<script>alert('Berhasil Terhapus');location.replace('?page=dokter')</script>";
    }
  }
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Dokter</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <table id="dokter" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Dokter</th>
                    <th>Pengalaman</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM dokter";
                    $result = mysqli_query($conn,$sql);
                    foreach ($result as $r) {
                  ?>
                      <tr>
                        <td>
                          <?= $r['id'] ?>
                          <a href="?page=dokter-edit&id=<?= $r['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="?page=dokter&id=<?= $r['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                        <td><?= $r['nama'] ?></td>
                        <td><?= $r['pengalaman'] ?> Tahun</td>
                        <td><?= $r['harga'] ?></td>
                        <td>
                          <a href="../dokter/chat/<?= $r['gambar'] ?>" target="_blank"><?= $r['gambar'] ?></a>
                        </td>
                      </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
