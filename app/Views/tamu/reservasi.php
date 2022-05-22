<?= $this->extend('tamu/layouts/templates') ?>
<?= $this->section('tamu-content') ?>

<!-- data-reservasi -->
<section class="data-reservasi">
   <div class="container">
      <div class="row">
         <div class="col">
            <div class="text-center mb-4">
               <h1>Data Reservasi</h1>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-lg-10 col-sm-12">
            <!-- alert -->
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
               <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path
                     d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
               </symbol>
               <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path
                     d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
               </symbol>
            </svg>
            <div class="alert alert-success d-flex align-items-center" role="alert">
               <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                  <use xlink:href="#check-circle-fill" />
               </svg>
               <div>
                  Silahkan cetak bukti transaksi dan bawa ketika Check-In
               </div>
            </div>
            <!-- alert -->
            <div class="pembayaran-berhasil" data-flashdata="<?= session()->getFlashdata('berhasilDiBayar') ?>"></div>
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
               <a href="<?= base_url('/tamu/cetakStruk') ?>" target="_blank" class="btn btn-primary float-end"><i
                     class="bi bi-file-earmark-text-fill"></i>
                  Cetak Bukti
                  Transaksi</a>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- end data-reservasi -->

<!-- gelombang -->
<div class="gelombang-footer">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#eeee" fill-opacity="1"
         d="M0,128L60,149.3C120,171,240,213,360,229.3C480,245,600,235,720,234.7C840,235,960,245,1080,218.7C1200,192,1320,128,1380,96L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
      </path>
   </svg>
</div>

<?= $this->endSection() ?>