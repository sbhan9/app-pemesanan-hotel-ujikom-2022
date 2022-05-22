<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="<?= base_url('icon.png') ?>" type="image/png">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="<?= base_url('/assets/css/custom.css') ?>">
   <title><?= $title ?></title>
</head>

<body class="body-daftar">
   <!-- navbar -->
   <?= $this->include('home/layouts/header') ?>

   <!-- laptop -->
   <section class="daftar d-none d-lg-block">
      <div class="d-flex">
         <div class="col col-kiri"></div>
         <div class="col col-kanan">
            <div class="container container-daftar">
               <div class="row justify-content-center">
                  <div class="col-lg-11">
                     <div class="card card-daftar">
                        <div class="card-body">
                           <!-- alert -->
                           <div class="pw" data-flashdata="<?= session()->getFlashdata('pwTidakSama') ?>"></div>
                           <div class="daftar-berhasil"
                              data-flashdata="<?= session()->getFlashdata('daftarBerhasil') ?>">
                           </div>
                           <h2 class="text-center mb-2">Halaman Daftar</h2>
                           <hr class="mt-0 shadow">
                           <form action="<?= base_url('/daftar') ?>" method="post" class="mt-3" autocomplete="off">
                              <?= csrf_field() ?>
                              <div class="input-group mb-3">
                                 <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                 <input type="text" name="nama_lengkap"
                                    class="form-control <?= ($validasi->getError('nama_lengkap')) ? 'is-invalid' : '' ?>"
                                    autofocus placeholder="Nama Lengkap" value="<?= old('nama_lengkap') ?>">
                                 <div class="invalid-feedback">
                                    <?= $validasi->getError('nama_lengkap') ?>
                                 </div>
                              </div>
                              <div class="input-group mb-3">
                                 <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                 <input type="text" name="no_telp"
                                    class="form-control <?= ($validasi->getError('no_telp')) ? 'is-invalid' : '' ?>"
                                    autofocus placeholder="No. Telephone" value="<?= old('no_telp') ?>">
                                 <div class="invalid-feedback">
                                    <?= $validasi->getError('no_telp') ?>
                                 </div>
                              </div>
                              <div class="input-group mb-3">
                                 <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                 <input type="text" name="email"
                                    class="form-control <?= ($validasi->getError('email')) ? 'is-invalid' : '' ?>"
                                    autofocus placeholder="Email" value="<?= old('email') ?>">
                                 <div class="invalid-feedback">
                                    <?= $validasi->getError('email') ?>
                                 </div>
                              </div>
                              <div class="input-group mb-3">
                                 <span class="input-group-text"><i class=" bi bi-people-fill"></i></span>
                                 <input type="text"
                                    class="form-control <?= ($validasi->getError('username')) ? 'is-invalid' : '' ?>"
                                    name="username" autofocus placeholder="Username" value="<?= old('username') ?>">
                                 <div class="invalid-feedback">
                                    <?= $validasi->getError('username') ?>
                                 </div>
                              </div>
                              <div class="input-group mb-3">
                                 <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                                 <input type="password"
                                    class="form-control <?= ($validasi->getError('pw1')) ? 'is-invalid' : '' ?>"
                                    name="pw1" id="password" autofocus placeholder="Password">
                                 <div class="invalid-feedback">
                                    <?php if($validasi->hasError('pw1')) : ?>
                                    <?= $validasi->getError('pw1') ?>
                                    <?php else : ?>
                                    Capslock aktif
                                    <?php endif ?>
                                 </div>
                              </div>
                              <div class="input-group mb-3">
                                 <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                                 <input type="password" id="pw2"
                                    class="form-control <?= ($validasi->getError('pw2')) ? 'is-invalid' : '' ?>"
                                    name="pw2" autofocus placeholder="Konfirmasi Password">
                                 <div class="invalid-feedback">
                                    <?php if($validasi->hasError('pw2')) : ?>
                                    <?= $validasi->getError('pw2') ?>
                                    <?php else : ?>
                                    Capslock aktif
                                    <?php endif ?>
                                 </div>
                              </div>
                              <button type="submit" class="btn btn-primary w-100 shadow">Daftar</button>
                              <a href="<?= base_url('/masuk') ?>" class="d-block mt-2 text-center">sudah punya akun?
                                 masuk</a>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="daftar-android d-sm-block d-lg-none d-md-none">
      <div class="container">
         <div class="row">
            <div class="col">
               <div class="card card-daftar">
                  <div class="card-body">
                     <!-- alert -->
                     <div class="pw" data-flashdata="<?= session()->getFlashdata('pwTidakSama') ?>"></div>
                     <div class="daftar-berhasil" data-flashdata="<?= session()->getFlashdata('daftarBerhasil') ?>">
                     </div>
                     <h2 class="text-center mb-2">Halaman Daftar</h2>
                     <hr class="mt-0 shadow">
                     <form action="<?= base_url('/daftar') ?>" method="post" class="mt-3" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="input-group mb-3">
                           <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                           <input type="text" name="nama_lengkap"
                              class="form-control <?= ($validasi->getError('nama_lengkap')) ? 'is-invalid' : '' ?>"
                              autofocus placeholder="Nama Lengkap" value="<?= old('nama_lengkap') ?>">
                           <div class="invalid-feedback">
                              <?= $validasi->getError('nama_lengkap') ?>
                           </div>
                        </div>
                        <div class="input-group mb-3">
                           <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                           <input type="text" name="no_telp"
                              class="form-control <?= ($validasi->getError('no_telp')) ? 'is-invalid' : '' ?>" autofocus
                              placeholder="No. Telephone" value="<?= old('no_telp') ?>">
                           <div class="invalid-feedback">
                              <?= $validasi->getError('no_telp') ?>
                           </div>
                        </div>
                        <div class="input-group mb-3">
                           <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                           <input type="text" name="email"
                              class="form-control <?= ($validasi->getError('email')) ? 'is-invalid' : '' ?>" autofocus
                              placeholder="Email" value="<?= old('email') ?>">
                           <div class="invalid-feedback">
                              <?= $validasi->getError('email') ?>
                           </div>
                        </div>
                        <div class="input-group mb-3">
                           <span class="input-group-text"><i class=" bi bi-people-fill"></i></span>
                           <input type="text"
                              class="form-control <?= ($validasi->getError('username')) ? 'is-invalid' : '' ?>"
                              name="username" autofocus placeholder="Username" value="<?= old('username') ?>">
                           <div class="invalid-feedback">
                              <?= $validasi->getError('username') ?>
                           </div>
                        </div>
                        <div class="input-group mb-3">
                           <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                           <input type="password"
                              class="form-control <?= ($validasi->getError('pw1')) ? 'is-invalid' : '' ?>" name="pw1"
                              id="password" autofocus placeholder="Password">
                           <div class="invalid-feedback">
                              <?php if($validasi->hasError('pw1')) : ?>
                              <?= $validasi->getError('pw1') ?>
                              <?php else : ?>
                              Capslock aktif
                              <?php endif ?>
                           </div>
                        </div>
                        <div class="input-group mb-3">
                           <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                           <input type="password" id="pw2"
                              class="form-control <?= ($validasi->getError('pw2')) ? 'is-invalid' : '' ?>" name="pw2"
                              autofocus placeholder="Konfirmasi Password">
                           <div class="invalid-feedback">
                              <?php if($validasi->hasError('pw2')) : ?>
                              <?= $validasi->getError('pw2') ?>
                              <?php else : ?>
                              Capslock aktif
                              <?php endif ?>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 shadow">Daftar</button>
                        <a href="<?= base_url('/masuk') ?>" class="d-block mt-2 text-center">sudah punya akun?
                           masuk</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- android -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
   </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
   <script>
   $(document).ready(function() {
      // pesan password tidak sama
      const pwError = $('.pw').data('flashdata');
      if (pwError) {
         Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'password tidak sesuai',
            showConfirmButton: false,
            timer: 2000
         })
      }

      // pesan daftar berhasil
      const daftarBerhasil = $('.daftar-berhasil').data('flashdata');
      if (daftarBerhasil) {
         Swal.fire({
            icon: 'success',
            title: 'Selamat..',
            text: 'registrasi daftar berhasil',
            showConfirmButton: false,
            timer: 2000
         })
         setTimeout(function() {
            window.location.href = "<?= base_url('/masuk') ?>"
         }, 2000)
      }
   })
   </script>

   <script>
   var pw = document.getElementById("password");
   pw.addEventListener("keyup", function(event) {
      if (event.getModifierState("CapsLock")) {
         pw.classList.add('is-invalid')
      } else {
         pw.classList.remove('is-invalid')
      }
   });

   var pwDua = document.getElementById("pw2");
   pwDua.addEventListener("keyup", function(event) {
      if (event.getModifierState("CapsLock")) {
         pwDua.classList.add('is-invalid')
      } else {
         pwDua.classList.remove('is-invalid')
      }
   });
   </script>

</body>

</html>