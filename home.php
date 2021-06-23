<?php
  $sql = "SELECT COUNT(*) as jumlah FROM dokter";
  $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  $jumlah_dokter = $result['jumlah'];

  $sql = "SELECT COUNT(*) as jumlah FROM barang";
  $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  $jumlah_obat = $result['jumlah'];

  $sql = "SELECT COUNT(*) as jumlah FROM users";
  $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  $jumlah_users = $result['jumlah'];

  $sql = "SELECT COUNT(*) as jumlah FROM session";
  $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  $jumlah_session = $result['jumlah'];

  $sql = "SELECT COUNT(*) as jumlah FROM pendapatan";
  $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  $jumlah_beli = $result['jumlah'];

  $sql = "SELECT SUM(pendapatan) as jumlah FROM pendapatan";
  $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
  $pemasukan_total = $result['jumlah'];

  for ($i=0; $i < 12; $i++) {
    $bulan = $i+1;
    $sql = "SELECT MONTH(date) AS bulan,SUM(pendapatan) AS total FROM `pendapatan` WHERE YEAR(date)=YEAR(CURDATE()) AND MONTH(date)=$bulan";
    $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    if ($result['total'] != null) {
      $data_chart[$i] = $result['total'];
    }else {
      $data_chart[$i] = 0;
    }
  }
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1 class="m-0">Dashboard</h1> -->
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $jumlah_obat ?></h3>

              <p>Jumlah Obat</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $jumlah_dokter ?></h3>

              <p>Jumlah Dokter</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-medkit"></i>
            </div>
            <a href="?page=dokter" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $jumlah_users ?></h3>

              <p>Jumlah User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= str_replace(",00","",str_replace("Rp ","",rupiah($pemasukan_total))) ?></h3>

              <p>Total Pemasukan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <section class="col-lg-12 connectedSortable">
          <div class="card bg-gradient-info">
            <div class="card-header border-0">
              <h3 class="card-title">
                Grafik Penjualan
              </h3>
            </div>
            <div class="card-body">
              <canvas class="chart" id="pendapatan-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-transparent">
              <div class="row">
                <div class="col-6 text-center">
                  <input type="text" class="knob" data-readonly="true" value="<?= $jumlah_beli ?>" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="text-white">Pembelian Obat</div>
                </div>
                <!-- ./col -->
                <div class="col-6 text-center">
                  <input type="text" class="knob" data-readonly="true" value="<?= $jumlah_session ?>" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="text-white">Chat Dokter</div>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-footer -->
          </div>
        </section>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
