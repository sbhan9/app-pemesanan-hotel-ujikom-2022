<?= $this->extend('layouts_dashboard/templates') ?>
<?= $this->section('dashboard-content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
               <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text">Total Akun Tamu</span>
                  <span class="info-box-number">
                     <?= $totalTamu->id_user ?> Tamu
                  </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bed"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text">Tamu Booking</span>
                  <span class="info-box-number"><?= $stokKamar->id_order ?> Tamu</span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->

         <!-- fix for small devices only -->
         <div class="clearfix hidden-md-up"></div>

         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text">Total Resepsionis</span>
                  <span class="info-box-number"><?= $totalResepsionis->id_user ?> Resepsionis</span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text">Total Admin</span>
                  <span class="info-box-number"><?= $totalAdmin ?> Administrator</span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Daftar Akun Dengan Level Tamu</h5>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table class="table table-bordered">
                     <thead>
                        <tr class="text-center">
                           <th scope="col">No.</th>
                           <th scope="col">Nama</th>
                           <th scope="col">Username</th>
                           <th scope="col">Email</th>
                           <th scope="col">No. Telephone</th>
                           <th scope="col">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($tamu as $t) : ?>
                        <tr>
                           <th class="text-center" scope="row"><?= $no++ ?>.</th>
                           <td><?= $t['nama_lengkap'] ?></td>
                           <td><?= $t['username'] ?></td>
                           <td><?= $t['email'] ?></td>
                           <td><?= $t['no_telp'] ?></td>
                           <td>
                              <div class="d-flex justify-content-center">
                                 <a href="<?php echo base_url('/administrator/detail-pengguna/'.$t['username']) ?>"
                                    class="btn btn-info mr-2"><i class="fas fa-info-circle"></i></a>
                              </div>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
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