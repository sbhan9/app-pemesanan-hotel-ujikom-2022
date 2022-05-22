<?= $this->extend('tamu/layouts/templates') ?>
<?= $this->section('tamu-content') ?>

<!-- hero -->
<section class="hero">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 col-sm-12">
            <div class="text-hero" data-aos="fade-right">
               <h1 class="fw-bold">Selamat Datang</h1>
               <p class="mt-3">Di website resmi Official Sumkul Hotel. Nikmati diskon dan promo yang berlimpah
                  dihotel kami menggunakan Voucher dan Hoki yang ada. Booking 1 bayar 1 Booking 2 bayar 2. Hari Sabtu
                  Gratis tapi kami libur.</p>
               <a href="<?= base_url('/page-tamu/kamar') ?>" class="btn btn-primary ps-3 pe-3 mt-2 animate__animated animate__pulse animate__infinite infinite
                  animate__slow">Pesan
                  Sekarang</a>
            </div>
         </div>
         <div class="col-lg-6">
            <img src="<?= base_url('/assets/img/hero-img.png') ?>"
               class="img-fluid d-none d-md-block animate__animated animate__backInRight animate__slow" />
         </div>
      </div>
   </div>
</section>
<!-- end hero -->

<!-- gelombang -->
<div class="gelombang">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#536dfe" fill-opacity="1"
         d="M0,96L80,101.3C160,107,320,117,480,149.3C640,181,800,235,960,245.3C1120,256,1280,224,1360,208L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
      </path>
   </svg>
</div>

<!-- reservasi -->
<section class="reservasi">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col">
            <div class="card card-reservasi" data-aos="fade-down">
               <div class="card-body">
                  <h1 class="card-title fw-bold text-center my-2 mb-2">Reservasi</h1>
                  <form class="formTeuing d-inline" method="get" action="">
                     <?= csrf_field() ?>
                     <div class=" row">
                        <div class="col-lg-3">
                           <div class="mb-3">
                              <label for="check_in" class="form-label">Check-In</label>
                              <input type="date" class="form-control" min="<?= date('Y-m-d') ?>"
                                 max="<?= date('Y-m-d', strtotime('+2 day')) ?>" name="checkin" id="checkin">
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="mb-3">
                              <label for="check_out" class="form-label">Check-Out</label>
                              <input type="date" class="form-control" min="<?= date('Y-m-d', strtotime('tomorrow')) ?>"
                                 name="checkout" id="checkout">
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Tipe Kamar</label>
                              <select id="inputState" name="tipekamar" class="form-select" onchange="jalanKeunHarga()">
                                 <option value="">Pilih tipe</option>
                                 <?php foreach($kamar as $k) : ?>
                                 <option value="<?= $k['harga'] ?>|<?= $k['kode_kamar'] ?>"><?= $k['tipe_kamar'] ?>
                                 </option>
                                 <?php endforeach ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="mb-3">
                              <label for="hargaPerHari" class="form-label">Harga/Hari</label>
                              <input type="text" class="form-control" name="harga" id="hargaPerHari" readonly />
                           </div>
                        </div>
                     </div>
                     <button type="submit" id="tombolReservasi" class="btn btn-primary w-100 mb-3">Pesan
                        Sekarang</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end reservasi -->

<!-- gelombang -->
<div class="gelombang">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#536dfe" fill-opacity="1"
         d="M0,64L60,64C120,64,240,64,360,58.7C480,53,600,43,720,53.3C840,64,960,96,1080,128C1200,160,1320,192,1380,208L1440,224L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
      </path>
   </svg>
</div>

<!-- about -->
<section class="about">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <img src="<?= base_url('/assets/img/about-img.png') ?>" class="img-fluid d-none d-md-block"
               data-aos="fade-right" />
         </div>
         <!-- desktop -->
         <div class="col-lg-6 col-sm-12 d-none d-lg-block">
            <div class="text-about" data-aos="fade-left">
               <h1 class="fw-bold">Tentang Kami</h1>
               <p class="mt-3">
                  Sumkul Hotel adalah hotel yang berdiri sejak tidak kebagian kursi yang terletak di pusat kota
                  Banjar, tepatnya di Jalan Pamongkoran No. 153. Hotel ini merupakan hotel bintang tiga yang
                  berlokasi strategis di pusat kota
                  Banjar. Lokasi yang sempurna dan akses mudah ke daerah wisata membuat pengunjung dapat sambil
                  bekerja dan liburan. Hotel ini memiliki total 20 kamar yang terdiri atas 7 Kamar Superior, 45 Kamar
                  Deluxe, 4 Suite Junior, dan 2
                  Suite Eksekutif. Sumkul Hotel berjarak sekitar 1 km dari Samsat Kota Banjar.
               </p>
            </div>
         </div>
         <!-- android -->
         <div class="col-lg-6 col-sm-12 d-lg-none d-md-none d-sm-block" data-aos="zoom-in">
            <div class="text-about">
               <h1 class="fw-bold">Tentang Kami</h1>
               <p class="mt-3">
                  Sumkul Hotel adalah hotel yang berdiri sejak tidak kebagian kursi yang terletak di pusat kota
                  Banjar, tepatnya di Jalan Pamongkoran No. 153. Hotel ini merupakan hotel bintang tiga yang
                  berlokasi strategis di pusat kota
                  Banjar. Lokasi yang sempurna dan akses mudah ke daerah wisata membuat pengunjung dapat sambil
                  bekerja dan liburan. Hotel ini memiliki total 20 kamar yang terdiri atas 7 Kamar Superior, 45 Kamar
                  Deluxe, 4 Suite Junior, dan 2
                  Suite Eksekutif. Sumkul Hotel berjarak sekitar 1 km dari Samsat Kota Banjar.
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end about -->

<!-- peta dan alamat -->
<section class="peta" data-aos="fade-up">
   <!-- desktop -->
   <div class="container">
      <div class="row">
         <div class="col">
            <h1 class="text-center mt-3 mb-3 fw-bold">Alamat dan Informasi</h1>
         </div>
      </div>
      <div class="row mt-3">
         <div class="col-lg-6">
            <iframe
               src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.7421839410454!2d108.52016211418477!3d-7.382763294672868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f6206d14c2abf%3A0xba546e7d85e14610!2sJl.%20Pamongkoran%2C%20Mekarsari%2C%20Kec.%20Banjar%2C%20Kota%20Banjar%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1643597303068!5m2!1sid!2sid"
               style="border: 0; width: 100%; height: 350px" allowfullscreen="" loading="lazy"></iframe>
         </div>
         <div class="col-lg-5">
            <p>Nikmati diskon dan promo yang berlimpah dihotel kami menggunakan Voucher dan Hoki yang ada. Booking 1
               bayar 1 Booking 2 bayar 2. Hari Sabtu Gratis tapi kami libur.</p>
         </div>
      </div>
   </div>
</section>
<!-- end peta dan alamt -->

<!-- gelombang -->
<div class="gelombang-footer">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#eeee" fill-opacity="1"
         d="M0,128L60,149.3C120,171,240,213,360,229.3C480,245,600,235,720,234.7C840,235,960,245,1080,218.7C1200,192,1320,128,1380,96L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
      </path>
   </svg>
</div>

<?= $this->endSection() ?>