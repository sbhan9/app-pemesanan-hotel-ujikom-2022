<?= $this->extend('tamu/layouts/templates') ?>
<?= $this->section('tamu-content') ?>

<!-- booking -->
<section class="booking-hotel">
   <div class="container">
      <div class="row">
         <div class="col">
            <div class="text-center mb-4">
               <h1>Booking Kamar</h1>
               <p class="pesan-booking">harap di isi sesuai data yang ada di Kartu Tanda Penduduk(KTP)</p>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-lg-10 col-sm-12">
            <!-- alert -->
            <div class="order-berhasil" data-flashdata="<?= session()->getFlashdata('orderBerhasil') ?>"></div>
            <div class="terdaftar" data-validasi="<?= $validasi->hasError('username') ?>"></div>
            <?php if( !$stokKamar ) : ?>
            <div class="alert alert-info d-flex align-items-center" role="alert">
               <div>
                  stok kamar habis :(
               </div>
            </div>
            <?php endif ?>
            <form action="<?= base_url('/page-tamu/booking-now') ?>" method="post">
               <?= csrf_field() ?>
               <input type="hidden" name="kodeKamar" value="<?= $kodeKamar ?>">
               <div class="row mb-3">
                  <label for="tipekamar" class="col-sm-2 col-form-label">Tipe Kamar</label>
                  <div class="col-sm-10">
                     <input type="text" name="tipekamar" class="form-control" id="tipekamar" readonly
                        value="<?= $dataKamar['tipe_kamar'] ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="hargaperkamar" class="col-sm-2 col-form-label">Harga / hari</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="hargaperkamar" id="hargaperkamar" readonly
                        value="<?= $dataKamar['harga'] ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="jmlhkamar" class="col-sm-2 col-form-label">Jumlah Kamar</label>
                  <div class="col-sm-10">
                     <select class="form-select <?= ($validasi->hasError('jmlhkamar')) ? 'is-invalid' : '' ?>"
                        name="jmlhkamar" id="jmlhkamar">
                        <option value="">Pilih Kamar</option>
                        <?php $kam = 1 ?>
                        <?php $val = 1 ?>
                        <?php for($kamar = 1; $kamar <= $stokKamar; $kamar++) : ?>
                        <option value="<?= $val++ ?>"><?= $kam++ ?> kamar</option>
                        <?php endfor ?>
                     </select>
                     <div class="invalid-feedback">
                        <?= $validasi->getError('jmlhkamar') ?>
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="username" id="username" readonly
                        value="<?= $dataUser['username'] ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="email" id="email" readonly
                        value="<?= $dataUser['email'] ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                     <input type="text"
                        class="form-control <?= ($validasi->hasError('namalengkap')) ? 'is-invalid' : '' ?>"
                        name="namalengkap" id="namalengkap" value="<?= $dataUser['nama_lengkap'] ?>">
                     <div class="invalid-feedback">
                        <?= $validasi->getError('namalengkap') ?>
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                     <textarea class="form-control <?= ($validasi->hasError('alamat')) ? 'is-invalid' : '' ?>"
                        id="alamat" name="alamat" rows="4"><?= $dataUser['alamat'] ?></textarea>
                     <div class="invalid-feedback">
                        <?= $validasi->getError('alamat') ?>
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="notelephone" class="col-sm-2 col-form-label">No. Telephone</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="notelephone" id="notelephone" readonly
                        value="<?= $dataUser['no_telp'] ?>">
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="checkin" class="col-sm-2 col-form-label">Check In</label>
                  <div class="col-sm-10">
                     <input type="date" class="form-control <?= ($validasi->hasError('checkin')) ? 'is-invalid' : '' ?>"
                        min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+2 day')) ?>" name="checkin"
                        id="checkin" value="<?= (!empty($_GET['checkin'])) ? $_GET['checkin'] : '' ?>">
                     <div class="invalid-feedback">
                        <?= $validasi->getError('checkin') ?>
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="checkout" class="col-sm-2 col-form-label">Check Out</label>
                  <div class="col-sm-10">
                     <input type="date"
                        class="form-control <?= ($validasi->hasError('checkout')) ? 'is-invalid' : '' ?>"
                        min="<?= date('Y-m-d', strtotime('tomorrow')) ?>" name="checkout" id="checkout"
                        value="<?= (!empty($_GET['checkout'])) ? $_GET['checkout'] : '' ?>">
                     <div class="invalid-feedback">
                        <?= $validasi->getError('checkout') ?>
                     </div>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="lamainap" class="col-sm-2 col-form-label">Lama Inap</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="lamainap" id="lamainap" readonly>
                  </div>
               </div>
               <div class="row mb-3">
                  <label for="totalbiaya" class="col-sm-2 col-form-label">Total Biaya</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="totalbiaya" id="totalbiaya" readonly>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary float-end"><i class="bi bi-house-fill"></i> Booking
                  Sekarang</button>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- end hero -->

<!-- gelombang -->
<div class="gelombang-footer">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#eeee" fill-opacity="1"
         d="M0,128L60,149.3C120,171,240,213,360,229.3C480,245,600,235,720,234.7C840,235,960,245,1080,218.7C1200,192,1320,128,1380,96L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
      </path>
   </svg>
</div>

<?= $this->endSection() ?>