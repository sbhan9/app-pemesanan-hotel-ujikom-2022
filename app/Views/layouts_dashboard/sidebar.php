<nav class="mt-2">
   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <li class="nav-item">
         <a href="<?= base_url('/administrator') ?>" class="nav-link <?= ($active == 'index') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
               Dashboard
            </p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('/administrator/data-admin') ?>"
            class="nav-link <?= ($active == 'admin') ? 'active' : '' ?>">
            <i class="fas fa-users-cog nav-icon"></i>
            <p>Admin</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('/administrator/data-resepsionis') ?>"
            class="nav-link <?= ($active == 'resepsionis') ? 'active' : '' ?>">
            <i class="fas fa-users-cog nav-icon"></i>
            <p>Resepsionis</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('/administrator/kamar') ?>" class="nav-link <?= ($active == 'kamar') ? 'active' : '' ?>">
            <i class="fas fa-bed nav-icon"></i>
            <p>Fasilitas Kamar</p>
         </a>
      </li>
      <li class="nav-item">
         <a href="<?= base_url('/administrator/fasilitas-umum') ?>"
            class="nav-link <?= ($active == 'fasilitas') ? 'active' : '' ?>">
            <i class="fas fa-hotel nav-icon"></i>
            <p>Fasilitas Umum</p>
         </a>
      </li>
   </ul>
</nav>