<?= $this->extend('layouts_dashboard/templates') ?>
<?= $this->section('dashboard-content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Data Resepsionis</h1>
         </div><!-- /.col -->
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
   <div class="container-fluid">

      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Daftar Resepsionis</h5>
                  <div class="hapusBerhasil" data-flashdata="<?php echo session()->getFlashdata('hapusBerhasil') ?>"></div>
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
                           <?php if( session()->id_level == 1 ) : ?>
                              <th scope="col">Aksi</th>
                           <?php endif ?>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($resepsionis as $r) : ?>
                           <tr>
                              <th class="text-center" scope="row"><?= $no++ ?>.</th>
                              <td><?= $r['nama_lengkap'] ?></td>
                              <td><?= $r['username'] ?></td>
                              <td><?= $r['email'] ?></td>
                              <td><?= $r['no_telp'] ?></td>
                              <td>
                                 <div class="d-flex justify-content-center">
                                    <a href="<?php echo base_url('/administrator/detail-pengguna/'.$r['username']) ?>" class="btn btn-info mr-2"><i class="fas fa-info-circle"></i></a>
                                    <?php if( session()->id_level == 1 ) : ?>
                                       <a href="<?php echo base_url('/administrator/delete-resepsionis/'.$r['username']) ?>" id="tombolHapusAdmin" class="btn btn-danger mr-2"><i class="fas fa-trash-alt"></i></a>
                                    <?php endif ?>
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