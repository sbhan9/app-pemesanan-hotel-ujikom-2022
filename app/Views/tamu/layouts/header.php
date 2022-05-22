<nav class="navbar navbar-expand-lg navbar-light bg-light p-4 shadow fixed-top">
   <div class="container">
      <a class="navbar-brand fw-bold" href="<?= base_url('/page-tamu') ?>"><span
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
                  href="<?= base_url('/page-tamu') ?>">Beranda</a>
               <?php if($active == 'index') : ?>
               <hr class="d-none d-md-none d-lg-block">
               <?php endif ?>
            </li>
            <li class="nav-item">
               <a class="nav-link <?= ($active == 'kamar') ? 'active' : '' ?>"
                  href="<?= base_url('/page-tamu/kamar') ?>">Kamar</a>
               <?php if($active == 'kamar') : ?>
               <hr class="d-none d-md-none d-lg-block">
               <?php endif ?>
            </li>
         </ul>
         <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="<?= base_url('/foto_profile/'.session()->foto_profile) ?>"
                     class="rounded-circle img-fluid img-profile" alt="<?= session()->username ?>">
                  <?= session()->nama_lengkap ?>
               </a>
               <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?= base_url('/page-tamu/profile') ?>"><i
                           class="bi bi-person-circle"></i> Profile</a></li>
                  <li><a class="dropdown-item mt-1" href="<?= base_url('/page-tamu/profile/bookingan') ?>"><i
                           class="bi bi-file-earmark-text-fill"></i> Reservasi</a>
                  </li>
                  <li>
                     <hr class="dropdown-divider w-75 mt-1">
                  </li>
                  <li><a class="dropdown-item mt-2" href="<?= base_url('/keluar') ?>"><i
                           class="bi bi-box-arrow-right"></i>
                        Keluar</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>