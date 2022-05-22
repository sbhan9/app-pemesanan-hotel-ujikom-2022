<nav class="navbar navbar-expand-lg navbar-light bg-light p-4 shadow fixed-top">
   <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>"><span
            class="bg-primary fw-bolder py-2 px-3 rounded text-white"><i class="bi bi-house-door"></i> Sumkul</span>
         Hotel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
         aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav nav-tengah fw-bold">
            <li class="nav-item">
               <a class="nav-link <?= ($active == 'index') ? 'active' : '' ?>" aria-current="page"
                  href="<?= base_url('/') ?>">Beranda</a>
               <?php if($active == 'index') : ?>
               <hr class="d-none d-md-none d-lg-block">
               <?php endif ?>
            </li>
            <li class="nav-item">
               <a class="nav-link <?= ($active == 'kamar') ? 'active' : '' ?>"
                  href="<?= base_url('/kamar') ?>">Kamar</a>
               <?php if($active == 'kamar') : ?>
               <hr class="d-none d-md-none d-lg-block">
               <?php endif ?>
            </li>
         </ul>
         <ul class="navbar-nav ms-auto nav-kanan">
            <li class="nav-item">
               <a class="nav-link btn btn-outline-primary daftar ps-4 pe-4" href="<?= base_url('/daftar') ?>">Daftar</a>
            </li>
            <li class="nav-item">
               <a class="nav-link btn btn-outline-primary ps-4 pe-4 fw-bold" href="<?= base_url('/masuk') ?>">Masuk</a>
            </li>
         </ul>
      </div>
   </div>
</nav>