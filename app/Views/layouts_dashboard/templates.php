<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?= $title ?></title>
   <link rel="icon" href="<?= base_url('icon.png') ?>" type="image/png">

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&display=fallback">
   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/fontawesome-free/css/all.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= base_url() ?>/dashboard/dist/css/adminlte.min.css?<?= time() ?>">
   <link rel="stylesheet" href="<?= base_url('/assets/css/custom.css') ?>">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

   <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-dark">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>

         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                  <i class="fas fa-cogs"></i>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('/keluar') ?>">
                  <i class="fas fa-sign-out-alt"></i>
               </a>
            </li>
         </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <p class="brand-link">
            <img src="<?= base_url() ?>/dashboard/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
               class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light fw-bold">Sumkul Hotel</span>
         </p>

         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="<?= base_url('/foto_profile/'.session()->foto_profile) ?>" class="img-circle elevation-2"
                     alt="User Image">
               </div>
               <div class="info">
                  <a href="#" class="d-block"><?= session()->nama_lengkap ?></a>
               </div>
            </div>

            <!-- Sidebar Menu -->
            <?= $this->include('layouts_dashboard/sidebar') ?>
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <?= $this->renderSection('dashboard-content') ?>
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
         <strong>Copyright &copy; 2019-<?= date('Y') ?> Sumkul Hotel
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
               <b>Version</b> 3.1.0
            </div>
      </footer>
   </div>
   <!-- ./wrapper -->

   <!-- REQUIRED SCRIPTS -->
   <!-- jQuery -->
   <script src="<?= base_url() ?>/dashboard/plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap -->
   <script src="<?= base_url() ?>/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- overlayScrollbars -->
   <script src="<?= base_url() ?>/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
   <!-- AdminLTE App -->
   <script src="<?= base_url() ?>/dashboard/dist/js/adminlte.js"></script>

   <!-- PAGE PLUGINS -->
   <!-- jQuery Mapael -->
   <script src="<?= base_url() ?>/dashboard/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
   <script src="<?= base_url() ?>/dashboard/plugins/raphael/raphael.min.js"></script>
   <script src="<?= base_url() ?>/dashboard/plugins/jquery-mapael/jquery.mapael.min.js"></script>
   <script src="<?= base_url() ?>/dashboard/plugins/jquery-mapael/maps/usa_states.min.js"></script>
   <!-- ChartJS -->
   <script src="<?= base_url() ?>/dashboard/plugins/chart.js/Chart.min.js"></script>

   <!-- AdminLTE for demo purposes -->
   <script src="<?= base_url() ?>/dashboard/dist/js/demo.js"></script>
   <script src="https://cdn.jsdelivr.net/combine/npm/slick-carousel@1.8.1,npm/sweetalert2@11.4.4"></script>
   <script>
   $(document).ready(function() {
      // hapus fasilitas umum
      $('a#tombolHapus').click(function(e) {
         e.preventDefault()
         const link = $(this).attr('href')
         Swal.fire({
            title: 'Apakah anda yakin?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
         }).then((result) => {
            if (result.isConfirmed) {
               window.location.href = link
            }
         })
      })

      // hapus kamar
      $('a#tombolHapusKamar').click(function(e) {
         e.preventDefault()
         const link = $(this).attr('href')
         Swal.fire({
            title: 'Apakah anda yakin?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
         }).then((result) => {
            if (result.isConfirmed) {
               window.location.href = link
            }
         })
      })

      // hapus admin
      $('a#tombolHapusAdmin').click(function(e) {
         e.preventDefault()
         const link = $(this).attr('href')
         Swal.fire({
            title: 'Apakah anda yakin?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
         }).then((result) => {
            if (result.isConfirmed) {
               window.location.href = link
            }
         })
      })

      const gagal = $('.gagal').data('flashdata')
      if (gagal) {
         Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap isi data dengan benar',
            showConfirmButton: false,
            timer: 1500
         })
      }

      const berhasil = $('.berhasil').data('flashdata')
      if (berhasil) {
         Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Tambah data berhasil',
            showConfirmButton: false,
            timer: 1500
         })
      }

      const hapusBerhasil = $('.hapusBerhasil').data('flashdata')
      if (hapusBerhasil) {
         Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Data user berhasil dihapus',
            showConfirmButton: false,
            timer: 1500
         })
      }

      const editBerhasil = $('.editBerhasil').data('flashdata')
      if (editBerhasil) {
         Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Data berhasil di diperbarui',
            showConfirmButton: false,
            timer: 1500
         })
      }
   })
   </script>
</body>

</html>