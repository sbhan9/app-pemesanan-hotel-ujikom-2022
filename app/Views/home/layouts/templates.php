<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />

   <!-- Bootstrap CSS -->
   <link href="<?= base_url('/assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
   <link rel="stylesheet" href="<?= base_url('/assets/css/custom.css') ?>" />

   <!-- icons -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

   <!-- font montserrat -->
   <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&family=Montserrat+Alternates:wght@300&family=Poppins&family=Roboto&display=swap"
      rel="stylesheet" />

   <!-- aos -->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

   <!-- animate css -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

   <!-- slick -->
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
   <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   <title><?= $title ?></title>
   <link rel="icon" href="<?= base_url('icon.png') ?>" type="image/png">
</head>

<body>
   <!-- header -->
   <?= $this->include('home/layouts/header') ?>
   <!-- end header -->

   <!-- render content -->
   <?= $this->renderSection('home-content') ?>
   <!-- end render content -->

   <!-- footer -->
   <?= $this->include('home/layouts/footer') ?>
   <!-- end footer -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="<?= base_url('/assets/js/bootstrap.bundle.min.js') ?>"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="<?= base_url('/assets/js/main.js') ?>"></script>
   <script src="<?= base_url('/assets/js/main.aos.js') ?>"></script>
   <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>
</body>

</html>