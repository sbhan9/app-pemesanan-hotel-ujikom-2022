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
   <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
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
            <?= $this->include('resepsionis/layouts/sidebar') ?>
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <?= $this->renderSection('resepsionis-content') ?>
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
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
   <script>
   $(document).ready(function() {
      $('#tabel-resepsionis, #tabelFilterDate').DataTable({
         "searching": false,
         "paging": true,
         "ordering": true,
         "info": false,
         "lengthChange": false
      });

      $('#table-checkin').DataTable({
         "searching": false,
         "paging": true,
         "ordering": true,
         "info": false
      });

      $('#table-checkout').DataTable({
         "searching": false,
         "paging": true,
         "ordering": true,
         "info": false
      });

      $('#filterDate').on('change', function() {
         $('#dataSearching').addClass('d-none')
         $('#getFilterDate').removeClass('d-none')
         $('#tabel-resepsionis').addClass('d-none')
         $.ajax({
            type: 'POST',
            url: "/resepsionis/tampilFilteringDate",
            data: {
               filteringDate: $(this).val()
            },
            cache: false,
            success: function(data) {
               console.log(data)
               $('#getFilterDate').html(data)
            }
         })
      })


      $('#search').on('keyup', function() {
         let t = $(this).val()
         $('#getFilterDate').addClass('d-none')
         $('#dataSearching').removeClass('d-none')
         $('#tabel-resepsionis').addClass('d-none')
         $.ajax({
            type: 'POST',
            url: '/resepsionis/serchingData',
            data: {
               keyword: t
            },
            success: function(data) {
               $('#dataSearching').html(data)
            }
         });
      });
   });
   </script>
</body>

</html>