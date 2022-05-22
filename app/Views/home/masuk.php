<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="<?= base_url('/assets/css/custom.css') ?>">
   <link rel="icon" href="<?= base_url('icon.png') ?>" type="image/png">
   <title><?= $title ?></title>
</head>

<body class="body-masuk">
   <!-- navbar -->
   <?= $this->include('home/layouts/header') ?>

   <!-- alert -->
   <div class="pwSalahSatu" data-flashdata="<?= session()->getFlashdata('pwSalahSatu') ?>"></div>
   <div class="pwSalah" data-flashdata="<?= session()->getFlashdata('pwSalah') ?>"></div>

   <!-- laptop -->
   <section class="masuk d-none d-sm-block d-md-block d-lg-block">
      <div class="d-flex">
         <div class="col col-kiri"></div>
         <div class="col col-kanan">
            <div class="container container-masuk">
               <div class="row justify-content-center">
                  <div class="col-lg-8">
                     <div class="card card-masuk">
                        <div class="card-body">
                           <h2 class="text-center mb-2">Halaman Masuk</h2>
                           <hr class="mt-0 shadow">
                           <form action="<?= base_url('/masuk') ?>" method="post" class="mt-3" autocomplete="off">
                              <?= csrf_field() ?>
                              <div class="input-group mb-3">
                                 <span class="input-group-text"><i class=" bi bi-people-fill"></i></span>
                                 <input type="text" name="username" class="form-control" autofocus
                                    placeholder="Username">
                              </div>
                              <div class="input-group mb-3">
                                 <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                                 <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password">
                                 <div class="invalid-feedback">
                                    Capslock aktif
                                 </div>
                              </div>
                              <div class="mb-3 form-check">
                                 <input type="checkbox" name="ingatkan_saya" class="form-check-input" id="ingatkansaya">
                                 <label class="form-check-label" for="ingatkansaya">Ingatkan saya</label>
                              </div>
                              <button type="submit" class="btn btn-primary w-100 shadow">Masuk</button>
                              <a href="<?= base_url('/daftar') ?>" class="d-block mt-2 text-center">belum punya akun?
                                 daftar</a>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- android -->
   <section class="masuk-android d-sm-none d-lg-none d-md-none">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-body">
                     <h2 class="text-center mb-2">Halaman Masuk</h2>
                     <hr class="mt-0 shadow">
                     <form action="<?= base_url('/masuk') ?>" method="post" class="mt-3" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="input-group mb-3">
                           <span class="input-group-text"><i class=" bi bi-people-fill"></i></span>
                           <input type="text" name="username" class="form-control" autofocus placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                           <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                           <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="mb-3 form-check">
                           <input type="checkbox" name="ingatkan_saya" class="form-check-input" id="ingatkansaya">
                           <label class="form-check-label" for="ingatkansaya">Ingatkan saya</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 shadow">Masuk</button>
                        <a href="<?= base_url('/daftar') ?>" class="d-block mt-2 text-center">belum punya akun?
                           daftar</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
   </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
   <script>
   $(document).ready(function() {
      // pesan password tidak sama
      const pwSalah = $('.pwSalah').data('flashdata');
      if (pwSalah) {
         Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Mohon maaf, anda belum terdaftar silahkan untuk daftar terlebih dahulu',
            showConfirmButton: false,
            timer: 4000
         })
         setTimeout(function() {
            window.location.href = '/daftar'
         }, 4000)
      }

      const pwSalahSatu = $('.pwSalahSatu').data('flashdata');
      if (pwSalahSatu) {
         Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'username dan password salah',
            showConfirmButton: false,
            timer: 4000
         })
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
   </script>

</body>

</html>