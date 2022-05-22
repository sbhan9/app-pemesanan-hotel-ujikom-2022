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
   <?= $this->include('tamu/layouts/header') ?>
   <!-- end header -->

   <!-- render content -->
   <?= $this->renderSection('tamu-content') ?>
   <!-- end render content -->

   <!-- footer -->
   <?= $this->include('tamu/layouts/footer') ?>
   <!-- end footer -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="<?= base_url('/assets/js/bootstrap.bundle.min.js') ?>"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="<?= base_url('/assets/js/main.js') ?>"></script>
   <script src="<?= base_url('/assets/js/main.aos.js') ?>"></script>
   <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.all.min.js"></script>
   <script>
   // alert order berhasil
   const orderBerhasil = $('.order-berhasil').data('flashdata');
   if (orderBerhasil) {
      Swal.fire({
         icon: 'success',
         title: 'Terimakasih. Kamar berhasil dibooking, silahkan cetak bukti transaksi',
         showConfirmButton: false,
         timer: 3000
      })
      setTimeout(function() {
         window.location.href = '/page-tamu/profile/bookingan';
      }, 3000)
   }

   const terdaftar = $('.terdaftar').data('validasi');
   if (terdaftar) {
      Swal.fire({
         icon: 'error',
         title: 'Opps.. anda sudah membooking kamar di Sumkul Hotel',
         showConfirmButton: false,
         timer: 3000
      })
   }

   const pembayaranBerhasil = $('.pembayaran-berhasil').data('flashdata');
   if (pembayaranBerhasil) {
      Swal.fire({
         icon: 'success',
         title: 'Terimakasih sudah melakukan pembayaran. Mohon tunggu konfirmasi dari admin',
         showConfirmButton: false,
         timer: 3000
      })
   }

   const updateProfileBerhasil = $('.updateProfileBerhasil').data('flashdata');
   if (updateProfileBerhasil) {
      Swal.fire({
         icon: 'success',
         title: 'Profile berhasil diperbarui',
         showConfirmButton: false,
         timer: 4000
      })
   }

   const berhasilUpdateSandi = $('.berhasilUpdateSandi').data('flashdata');
   if (berhasilUpdateSandi) {
      Swal.fire({
         icon: 'success',
         title: 'Kata sandi berhasil diperbarui, silahkan masuk kembali',
         showConfirmButton: false,
         timer: 4000
      })
      setTimeout(function() {
         window.location.href = '/keluar'
      }, 4000)
   }

   function belumBayar() {
      Swal.fire({
         icon: 'error',
         title: 'Opps.. anda belum membayar tagihan',
         showConfirmButton: false,
         timer: 3000
      })
   }

   // jenis bank 
   $('#pilihBank').on('change', function() {
      const jenisBank = $('.pilihBank').val()
      console.log(jenisBank);
      $('#norek').val(jenisBank);
   })

   // merubah tanggal checkout sesuai tanggal check in
   $('#checkin').on('change', function() {
      const checkIn = $('#checkin').val();
      const checkOut = $('#checkin').val();
      $('#checkout').removeAttr('min');
      $('#checkout').attr('min', checkIn);

   })

   // menambah lama inap sesuai check out
   $(document).ready(function() {
      $('#checkin, #checkout, #jmlhkamar').on('change textInput input', function() {
         if (($("#checkin").val() != "") && ($("#checkout").val() != "")) {
            var oneDay = 24 * 60 * 60 * 1000;
            var firstDate = new Date($("#checkin").val());
            var secondDate = new Date($("#checkout").val());
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (
               oneDay)));
            if (diffDays == 0) {
               var diffDays = 1;
            }
            $("#lamainap").val(diffDays + ' malam');

            // total biaya
            var total = $('#jmlhkamar').val() * Math.round(Number($('#hargaperkamar').val())) * diffDays;
            console.log(total);
            $('#totalbiaya').val(function() {
               var number_string = total.toString(),
                  sisa = number_string.length % 3,
                  rupiah = number_string.substr(0, sisa),
                  ribuan = number_string.substr(sisa).match(/\d{3}/g);

               if (ribuan) {
                  separator = sisa ? '.' : '';
                  rupiah += separator + ribuan.join('.');
               }
               return 'Rp. ' + rupiah
            })
         }
      });



   });
   </script>
</body>

</html>