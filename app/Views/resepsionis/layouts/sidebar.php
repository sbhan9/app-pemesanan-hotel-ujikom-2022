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
   </ul>
</nav>