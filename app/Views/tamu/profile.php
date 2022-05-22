<?= $this->extend('tamu/layouts/templates') ?>
<?= $this->section('tamu-content') ?>

<!-- data-reservasi -->
<section class="data-reservasi">
   <div class="container">
      <div class="row">
         <div class="col">
            <div class="text-center mb-4">
               <img src="<?= base_url('/foto_profile/'.session()->foto_profile) ?>" alt="<?= session()->nama_lengkap ?>"
                  class="w-10 rounded-circle img-thumbnail border border-info">
               <h3 class="mt-2"><?= session()->nama_lengkap ?></h3>
            </div>
         </div>
      </div>
      <div class="updateProfileBerhasil" data-flashdata="<?= session()->getFlashdata('updateBerhasil') ?>"></div>
      <div class="row justify-content-center">
         <div class="col-lg-10 col-sm-12">
            <form action="<?= base_url('/page-tamu/profile') ?>" method="post" enctype="multipart/form-data">
               <?= csrf_field() ?>
               <input type="hidden" name="fotolama" value="<?= $profile->foto_profile ?>">
               <div class="row mb-3">
                  <label for="fotoprofile" class="col-sm-3 col-form-label">Foto Profile</label>
                  <div class="col-sm-9">
                     <input type="file"
                        class="form-control <?= ($validasi->hasError('fotoprofile')) ? 'is-invalid' : '' ?>"
                        id="fotoprofile" name="fotoprofile">
                     <div class="invalid-feedback">
                        <?= $validasi->getError('fotoprofile') ?>
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="namalengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                     <input type="text" name="namalengkap"
                        class="form-control <?= ($validasi->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>"
                        id="namalengkap" value="<?= $profile->nama_lengkap ?>">
                     <div class="invalid-feedback">
                        <?= $validasi->getError('nama_lengkap') ?>
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="notelp" class="col-sm-3 col-form-label">No. Telephone</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control <?= ($validasi->hasError('no_telp')) ? 'is-invalid' : '' ?>"
                        name="notelp" id="notelp" value="<?= $profile->no_telp ?>">
                     <div class="invalid-feedback">
                        <?= $validasi->getError('no_telp') ?>
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="email" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control <?= ($validasi->hasError('email')) ? 'is-invalid' : '' ?>"
                        name="email" id="email" value="<?= $profile->email ?>">
                     <div class="invalid-feedback">
                        <?= $validasi->getError('email') ?>
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                     <textarea class="form-control <?= ($validasi->hasError('alamat')) ? 'is-invalid' : '' ?>"
                        id="alamat" name="alamat" rows="4"><?= $profile->alamat ?></textarea>
                     <div class="invalid-feedback">
                        <?= $validasi->getError('alamat') ?>
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="username" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                     <input type="text"
                        class="form-control <?= ($validasi->hasError('username')) ? 'is-invalid' : '' ?>"
                        name="username" id="username" value="<?= $profile->username ?>">
                     <div class="invalid-feedback">
                        <?= $validasi->getError('username') ?>
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="#" class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                     <a href="<?php echo base_url('/page-tamu/profile/ubah-sandi') ?>" class="text-decoration-none">ubah kata sandi disini</a>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary float-end"><i class="bi bi-person-fill"></i>
                  Perbarui Profile</button>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- end data-reservasi -->

<!-- gelombang -->
<div class="gelombang-footer">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#eeee" fill-opacity="1"
         d="M0,128L60,149.3C120,171,240,213,360,229.3C480,245,600,235,720,234.7C840,235,960,245,1080,218.7C1200,192,1320,128,1380,96L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
      </path>
   </svg>
</div>

<?= $this->endSection() ?>