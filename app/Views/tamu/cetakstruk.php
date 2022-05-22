<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cetak Struk <?= session()->username ?></title>
   <style>
   body,
   html {
      position: relative;
   }

   .pembungkus-judul,
   .info-struk,
   .pesan {
      padding: 0 100px;
      text-align: center;
   }

   .pembungkus-judul p {
      margin-top: -17px;
   }

   .pembungkus-judul hr {
      width: 700px;
   }

   .p-3 {
      margin-top: -10px !important;
   }

   .info-struk {
      display: flex;
      justify-content: center;
      text-align: left;
   }

   .td-titik-dua {
      width: 100px;
      text-align: center;
   }

   .pesan p {
      margin-top: 50px;
      text-align: center;
   }

   .pesan .p-2 {
      margin-top: -15px;
   }

   tr {
      height: 10% !important;
   }

   .isi-alamat {
      width: 50px;
   }
   </style>
</head>

<body>

   <div class="pembungkus-judul">
      <h2>SUMKUL HOTEL</h2>
      <p>KOTA BANJAR</p>
      <p>JL. GERILYA NO. 153 KOTA BANJAR</p>
      <p class="p-3">www.sumkulhotel.com</p>
      <hr>
   </div>

   <div class="info-struk">
      <table style="margin: 0 auto; padding-top: 20px;">
         <tbody>
            <tr>
               <td>Booking ID</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['kode_booking'] ?></td>
            </tr>
            <tr>
               <td>Tipe Kamar</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['tipe_kamar'] ?></td>
            </tr>
            <tr>
               <td>Harga / hari</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['harga'] ?></td>
            </tr>
            <tr>
               <td>Jumlah Kamar</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['jumlah_order'] ?></td>
            </tr>
            <tr>
               <td>Username</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['username'] ?></td>
            </tr>
            <tr>
               <td>Email</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['email'] ?></td>
            </tr>
            <tr>
               <td>Nama Lengkap</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['nama'] ?></td>
            </tr>
            <tr>
               <td>Alamat</td>
               <td class="td-titik-dua">:</td>
               <td class="isi-alamat"><?= $dataUser['alamat'] ?></td>
            </tr>
            <tr>
               <td>No. Telephone</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['no_telephone'] ?></td>
            </tr>
            <tr>
               <td>Check In</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['check_in'] ?></td>
            </tr>
            <tr>
               <td>Check Out</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['check_out'] ?></td>
            </tr>
            <tr>
               <td>Lama Inap</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['lama_hari'] ?></td>
            </tr>
            <tr>
               <td>Total Biaya</td>
               <td class="td-titik-dua">:</td>
               <td><?= $dataUser['total_bayar'] ?></td>
            </tr>
         </tbody>
      </table>
   </div>

   <div class="pesan">
      <p class="p-1">TERIMAKASIH SUDAH MENGINAP DIHOTEL KAMI</p>
      <p class="p-2">SEMOGA NYAMAN DAN TENANG</p>
   </div>

</body>

</html>