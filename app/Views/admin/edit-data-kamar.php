<?= $this->extend('layouts_dashboard/templates') ?>
<?= $this->section('dashboard-content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Data Kamar</h1>
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
                  <h5 class="card-title">Edit Data Kamar</h5>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <?php if(session()->getFlashdata('editError')) : ?>
                  <div class="alert alert-danger" role="alert">
                     <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('editError') ?>
                  </div>
                  <?php endif ?>
                  <form action="<?= base_url('/administrator/edit-data-kamar') ?>" method="post"
                     enctype="multipart/form-data">
                     <?= csrf_field() ?>
                     <input type="hidden" name="idfasilitas" value="<?= $dataid ?>">
                     <div class="form-group row">
                        <label for="tipekamar" class="col-sm-2 col-form-label">Tipe Kamar</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="tipekamar" id="tipekamar"
                              value="<?= $data->tipe_kamar ?>">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="fasilitaskamar" class="col-sm-2 col-form-label">Fasilitas Kamar</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" name="fasilitaskamar" id="fasilitaskamar"
                              rows="3"><?= $data->fasilitas ?></textarea>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="jumlahkamar" class="col-sm-2 col-form-label">Jumlah Kamar</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="jumlahkamar" id="jumlahkamar"
                              value="<?= $data->stok_kamar ?>">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="hargapermalam" class="col-sm-2 col-form-label">Harga Permalam</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="hargapermalam" id="hargapermalam"
                              value="<?= $data->harga ?>">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="kodekamar" class="col-sm-2 col-form-label">Kode Kamar</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="kodekamar" id="kodekamar"
                              value="<?= $data->kode_kamar ?>">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="fotoKamar" class="col-sm-2 col-form-label">Foto Fasilitas</label>
                        <div class="col-sm-10">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="fotoKamar" id="fotoKamar">
                              <label class="custom-file-label" for="fotoKamar"><?= $data->foto_kamar ?></label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-12">
                           <button type="submit" class="btn btn-primary float-right spasi-1">Perbarui</button>
                        </div>
                     </div>
                  </form>
               </div>
               <!-- ./card-body -->
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