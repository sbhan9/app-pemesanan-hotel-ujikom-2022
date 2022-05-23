<?= $this->extend('home/layouts/templates') ?>
<?= $this->section('home-content') ?>

<!-- kamar -->
<section class="kamar text-light">
    <!-- tampilan buat desktop -->
    <div class="d-none d-sm-none d-md-none d-lg-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-center mb-3">Pilih kamar dan tipe sesuai keinginan anda</h1>
                </div>
            </div>
            <div class="row text-dark">
                <div class="keur-slick">
                    <?php $no = 1; ?>
                    <?php foreach ($kamar as $k) : ?>
                    <div class="col-lg-3 mx-2 mt-3">
                        <div class="card card-kamar">
                            <div class="no-kamar">
                                <span class="bg-info p-1 rounded text-light">No. <?= $no++ ?></span>
                            </div>
                            <img src="<?= base_url('/img/' . $k['foto_kamar']) ?>" class="card-img-top p-2 img-kamar" />
                            <div class="card-body">
                                <h4 class="card-title text-center"><?= $k['tipe_kamar'] ?></h4>
                                <?php // mengubah data fasilitas menjadi array 
                           ?>
                                <?php $fasilitas = explode(',', $k['fasilitas']) ?>
                                <ul>
                                    <li><?= $fasilitas[0] ?></li>
                                    <li><?= $fasilitas[1] ?></li>
                                    <li><?= $fasilitas[2] ?></li>
                                    <li><?= $fasilitas[3] ?></li>
                                    <li><?= $fasilitas[4] ?></li>
                                </ul>
                                <a href="<?= base_url('/masuk') ?>" class="btn btn-primary w-100">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <!-- tampilan buat tablet -->
    <div class="kamar-tablet d-none d-sm-block d-md-block d-lg-none">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-center mb-3">Pilih kamar dan tipe sesuai keinginan anda</h1>
                </div>
            </div>
            <div class="row text-dark">
                <div class="keur-tablet">
                    <?php $no = 1; ?>
                    <?php foreach ($kamar as $k) : ?>
                    <div class="col-lg-3 mx-2 mt-3">
                        <div class="card card-kamar">
                            <div class="no-kamar">
                                <span class="bg-info p-1 rounded text-light">No. <?= $no++ ?></span>
                            </div>
                            <img src="<?= base_url('/img/' . $k['foto_kamar']) ?>" class="card-img-top p-2 img-kamar" />
                            <div class="card-body">
                                <h4 class="card-title text-center"><?= $k['tipe_kamar'] ?></h4>
                                <?php // mengubah data fasilitas menjadi array 
                           ?>
                                <?php $fasilitas = explode(',', $k['fasilitas']) ?>
                                <ul>
                                    <li><?= $fasilitas[0] ?></li>
                                    <li><?= $fasilitas[1] ?></li>
                                    <li><?= $fasilitas[2] ?></li>
                                    <li><?= $fasilitas[3] ?></li>
                                    <li><?= $fasilitas[4] ?></li>
                                </ul>
                                <a href="<?= base_url('/masuk') ?>" class="btn btn-primary w-100">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <!-- tampilan buat android -->
    <div class="kamar-dua text-light d-sm-blok d-lg-none d-md-none">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-center mb-3">Pilih kamar dan tipe sesuai keinginan anda</h1>
                </div>
            </div>
            <div class="row text-dark">
                <?php $no = 1; ?>
                <?php foreach ($kamar as $k) : ?>
                <div class="col-lg-3 mt-3">
                    <div class="card card-kamar">
                        <div class="no-kamar">
                            <span class="bg-info p-1 rounded text-light">No. <?= $no++ ?></span>
                        </div>
                        <img src="<?= base_url('/img/' . $k['foto_kamar']) ?>" class="card-img-top p-2 img-kamar" />
                        <div class="card-body">
                            <h4 class="card-title text-center"><?= $k['tipe_kamar'] ?></h4>
                            <?php // mengubah data fasilitas menjadi array 
                        ?>
                            <?php $fasilitas = explode(',', $k['fasilitas']) ?>
                            <ul>
                                <li><?= $fasilitas[0] ?></li>
                                <li><?= $fasilitas[1] ?></li>
                                <li><?= $fasilitas[2] ?></li>
                                <li><?= $fasilitas[3] ?></li>
                                <li><?= $fasilitas[4] ?></li>
                            </ul>
                            <a href="<?= base_url('/masuk') ?>" class="btn btn-primary w-100">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<!-- end kamar -->

<!-- gelombang -->
<div class="gelombang-kamar">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#386fbd" fill-opacity="1"
            d="M0,160L48,170.7C96,181,192,203,288,186.7C384,171,480,117,576,128C672,139,768,213,864,234.7C960,256,1056,224,1152,202.7C1248,181,1344,171,1392,165.3L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
        </path>
    </svg>
</div>

<!-- fasilitas -->
<section class="fasilitas">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="text-center mb-4">Fasilitas yang kami tawarkan</h1>
            </div>
        </div>
        <div class="row">
            <?php $no = 1; ?>
            <?php foreach ($fasilitasUmum as $f) : ?>
            <div class="col-lg-3 col-sm-6 mt-3">
                <div class="card">
                    <div class="no-kamar">
                        <span class="bg-secondary p-1 rounded text-light">No. <?= $no++ ?></span>
                    </div>
                    <img src="<?= base_url('/assets/img/' . $f['foto_fasilitas']) ?>"
                        class="card-img-top p-2 img-kamar" />
                    <div class="card-body">
                        <h4 class="card-title text-center"><?= $f['fasilitas'] ?></h4>
                        <?php // mengubah string menjadi array 
                     ?>
                        <?php $ket = explode(',', $f['keterangan']) ?>
                        <ul>
                            <li><?= $ket[0] ?></li>
                            <li><?= $ket[1] ?></li>
                            <li><?= (!empty($ket[2])) ? $ket[2] : '' ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- end fasilitas -->

<!-- gelombang -->
<div class="gelombang-footer">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#eeee" fill-opacity="1"
            d="M0,128L60,149.3C120,171,240,213,360,229.3C480,245,600,235,720,234.7C840,235,960,245,1080,218.7C1200,192,1320,128,1380,96L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
        </path>
    </svg>
</div>

<?= $this->endSection() ?>