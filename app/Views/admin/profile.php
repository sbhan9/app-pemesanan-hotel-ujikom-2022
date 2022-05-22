<?= $this->extend('layouts_dashboard/templates') ?>
<?= $this->section('dashboard-content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
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
               <div class="card-body">
                  <div class="d-flex justify-content-center">
                     <img src="<?= base_url('/foto_profile/'.session()->foto_profile) ?>"
                        alt="<?= session()->username ?>"
                        class="img-fluid border border-primary img-dashboard-profile rounded-circle">
                  </div>
                  <div class="data-profile">
                     <form>
                        <div class="form-group">
                           <label for="customFile">Foto Profile</label>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile"><?= session()->foto_profile ?></label>
                           </div>
                        </div>
                        <div class=" form-group">
                           <label for="namalengkap">Nama Lengkap</label>
                           <input type="text" class="form-control" id="namalengkap"
                              value="<?= session()->nama_lengkap ?>">
                        </div>
                        <div class="form-group">
                           <label for="telephone">No. Telephone</label>
                           <input type="text" class="form-control" id="telephone" value="<?= session()->no_telp ?>">
                        </div>
                        <div class=" form-group">
                           <label for="email">Alamat Email</label>
                           <input type="text" class="form-control" id="email" value="<?= session()->email ?>">
                        </div>
                        <div class="form-group">
                           <label for="alamat">Alamat</label>
                           <textarea class="form-control" id="alamat" rows="3"><?= session()->alamat ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="username">Username</label>
                           <input type="text" class="form-control" id="username" value="<?= session()->username ?>">
                        </div>
                        <div class="form-group">
                           <label for="password">Password</label>
                           <input type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                           <label for="pwBaru">Passoword Baru</label>
                           <input type="password" class="form-control" id="pwBaru">
                        </div>
                        <div class="form-group">
                           <label for="konfirPwBaru">Konfirmasi Passoword Baru</label>
                           <input type="password" class="form-control" id="konfirPwBaru">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Perbarui Profile</button>
                     </form>
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