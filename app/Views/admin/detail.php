<?= $this->extend('layouts_dashboard/templates') ?>
<?= $this->section('dashboard-content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail akun <?= $dataUser['nama_lengkap'] ?></h1>
                <a href="<?= base_url('/administrator') ?>" class="btn btn-primary mt-3"><i
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
                        <h5 class="card-title">Detail akun <?= $dataUser['nama_lengkap'] ?></h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <?= csrf_field() ?>
                            <div class="row mb-3">
                                <label for="namalengkap" class="col-sm-3 col-form-label">Booking ID</label>
                                <div class="col-sm-9">
                                    <input type="text" name="namalengkap" class="form-control" id="namalengkap" readonly
                                        value="<?= $dataUser['nama_lengkap'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="notelp" class="col-sm-3 col-form-label">No. Telephone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="notelp" class="form-control" id="notelp" readonly
                                        value="<?= $dataUser['no_telp'] ?>">
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
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="alamat" name="alamat" rows="4"
                                        readonly><?= $dataUser['alamat'] ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" id="username" readonly
                                        value="<?= $dataUser['username'] ?>">
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