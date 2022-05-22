<?= $this->extend('resepsionis/layouts/templates') ?>
<?= $this->section('resepsionis-content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Data Reservasi</h1>
         </div><!-- /.col -->
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
         <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
               <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text">Total Tamu</span>
                  <span class="info-box-number">
                     <?= $totalTamu->id_order ?>
                  </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bed"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text">Checkin hari ini</span>
                  <span
                     class="info-box-number"><?= ($totalCheckIn->id_order == 0) ? 'tidak ada' : $totalCheckIn->id_order ?></span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->

         <!-- fix for small devices only -->
         <div class="clearfix hidden-md-up"></div>

         <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text">Checkout hari ini</span>
                  <span
                     class="info-box-number"><?= ($totalCheckOut->id_order == 0) ? 'tidak ada' : $totalCheckOut->id_order ?></span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- filtering berdasarkan tanggal -->
      <div class="row">
         <div class="col-md-6">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Checkin hari ini</h5>
               </div>
               <div class="card-body">
                  <table class="table table-bordered" id="table-checkin">
                     <thead>
                        <tr class="text-center">
                           <th scope="col">No.</th>
                           <th scope="col">Nama Lengkap</th>
                           <th scope="col">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($checkInHariIni as $c) : ?>
                        <tr>
                           <th scope="row" class="text-center"><?= $no++ ?>.</th>
                           <td><?= $c->nama ?></td>
                           <td class="text-center">
                              <a href="<?= base_url('/page-resepsionis/detail/'.$c->username) ?>"
                                 class="btn btn-info tombol-detail"><i class="fas fa-info-circle"></i></a>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
         <div class="col-md-6">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Checkout hari ini</h5>
               </div>
               <div class="card-body">
                  <table class="table table-bordered" id="table-checkout">
                     <thead>
                        <tr class="text-center">
                           <th scope="col">No.</th>
                           <th scope="col">Nama Lengkap</th>
                           <th scope="col">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($checkOutHariIni as $cO) : ?>
                        <tr>
                           <th scope="row" class="text-center"><?= $no++ ?>.</th>
                           <td><?= $cO->nama ?></td>
                           <td class="text-center">
                              <a href="<?= base_url('/page-resepsionis/detail/'.$cO->username) ?>"
                                 class="btn btn-info tombol-detail"><i class="fas fa-info-circle"></i></a>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>

      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Daftar Reservasi</h5>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <div class="mb-5 d-none d-md-none d-xl-block">
                     <input type="text" class="form-control w-25 float-right ml-2" id="search" name="search"
                        style="margin-top: -8px;">
                     <input type="date" class="form-control w-25 float-right" id="filterDate" name="filterDate"
                        style="margin-top: -8px;">
                  </div>
                  <div class="container">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="mb-2 d-block d-md-block d-xl-none">
                              <input type="text" class="form-control mb-4" id="search" placeholder="masukkan nama"
                                 name="search" style="margin-top: -8px;">
                              <input type="date" class="form-control" id="filterDate" name="filterDate"
                                 style="margin-top: -8px;">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="table-responsive">
                     <div id="getFilterDate"></div>
                     <div id="dataSearching"></div>
                     <table class="table table-bordered" id="tabel-resepsionis">
                        <thead>
                           <tr class="text-center">
                              <th scope="col">No.</th>
                              <th scope="col">Nama Lengkap</th>
                              <th scope="col">Username</th>
                              <th scope="col">No. Telephone</th>
                              <th scope="col">Check In</th>
                              <th scope="col">Check Out</th>
                              <th scope="col">Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $no = 1; ?>
                           <?php foreach($orderan as $o) : ?>
                           <tr>
                              <th scope="row" class="text-center"><?= $no++ ?>.</th>
                              <td><?= $o['nama'] ?></td>
                              <td><?= $o['username'] ?></td>
                              <td><?= $o['no_telephone'] ?></td>
                              <td><?= $o['check_in'] ?></td>
                              <td><?= $o['check_out'] ?></td>
                              <td class="text-center">
                                 <a href="<?= base_url('/page-resepsionis/detail/'.$o['username']) ?>"
                                    class="btn btn-info tombol-detail"><i class="fas fa-info-circle"></i></a>
                              </td>
                           </tr>
                           <?php endforeach ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- ./card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->

   </div>
   <!--/. container-fluid -->
</section>
<!-- /.content -->


<?= $this->endSection() ?>