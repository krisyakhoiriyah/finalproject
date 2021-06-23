<?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `kategori` WHERE id='$id'";
    if (mysqli_query($conn,$sql)) {
      echo "<script>alert('Berhasil Terhapus');location.replace('?page=kategori')</script>";
    }
  }
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Obat</h1>
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
              <table id="obat" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM kategori";
                    $result = mysqli_query($conn,$sql);
                    foreach ($result as $r) {
                  ?>
                      <tr>
                        <td>
                          <?= $r['id'] ?>
                          <a href="?page=kategori-edit&id=<?= $r['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="?page=kategori&id=<?= $r['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                        <td><?= $r['nama_kategori'] ?></td>
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
