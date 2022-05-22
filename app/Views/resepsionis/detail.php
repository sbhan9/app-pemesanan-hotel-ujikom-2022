<?= $this->extend('resepsionis/layouts/templates') ?>
<?= $this->section('resepsionis-content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Data Tamu <?= $dataUser['nama'] ?></h1>
            <a href="<?= base_url('/page-resepsionis') ?>" class="btn btn-primary mt-3"><i
                  class="fas fa-arrow-circle-left"></i>
               kembali</a>
         </div><!-- /.col -->
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<section class="content">
   <div class="container-fluid">

      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Data tamu <?= $dataUser['nama'] ?></h5>
               </div>
               <div class="card-body">
                  <form action="#" method="post">
                     <?= csrf_field() ?>
                     <div class="row mb-3">
                        <label for="bookingId" class="col-sm-3 col-form-label">Booking ID</label>
                        <div class="col-sm-9">
                           <input type="text" name="bookingId" class="form-control" id="bookingId" readonly
                              value="<?= $dataUser['kode_booking'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="tipekamar" class="col-sm-3 col-form-label">Tipe Kamar</label>
                        <div class="col-sm-9">
                           <input type="text" name="tipekamar" class="form-control" id="tipekamar" readonly
                              value="<?= $dataUser['tipe_kamar'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="hargaperkamar" class="col-sm-3 col-form-label">Harga / hari</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="hargaperkamar" id="hargaperkamar" readonly
                              value="<?= $dataUser['harga'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="jmlhkamar" class="col-sm-3 col-form-label">Jumlah Kamar</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="jmlhkamar" id="jmlhkamar" readonly
                              value="<?= $dataUser['jumlah_order'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="username" id="username" readonly
                              value="<?= $dataUser['username'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="email" id="email" readonly
                              value="<?= $dataUser['email'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="namalengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="namalengkap" id="namalengkap" readonly
                              value="<?= $dataUser['nama'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                           <textarea class="form-control" id="alamat" name="alamat" rows="4"
                              readonly><?= $dataUser['alamat'] ?></textarea>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="notelephone" class="col-sm-3 col-form-label">No. Telephone</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="notelephone" id="notelephone" readonly
                              value="<?= $dataUser['no_telephone'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="checkin" class="col-sm-3 col-form-label">Check In</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="checkin" id="checkin" readonly
                              value="<?= $dataUser['check_in'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="checkout" class="col-sm-3 col-form-label">Check Out</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="checkout" id="checkout" readonly
                              value="<?= $dataUser['check_out'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="lamainap" class="col-sm-3 col-form-label">Lama Inap</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="lamainap" id="lamainap" readonly
                              value="<?= $dataUser['lama_hari'] ?>">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <label for="totalbiaya" class="col-sm-3 col-form-label">Total Biaya</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="totalbiaya" id="totalbiaya" readonly
                              value="<?= $dataUser['total_bayar'] ?>">
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!--/. container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection() ?>