<?= $this->extend('layouts_dashboard/templates') ?>
<?= $this->section('dashboard-content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Fasilitas Umum</h1>
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
                  <h5 class="card-title">Edit Data Fasilitas Umum</h5>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <?php if(session()->getFlashdata('editError')) : ?>
                  <div class="alert alert-danger" role="alert">
                     <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('editError') ?>
                  </div>
                  <?php endif ?>
                  <form action="<?= base_url('/administrator/edit-fasilitas-umum') ?>" method="post"
                     enctype="multipart/form-data">
                     <?= csrf_field() ?>
                     <input type="hidden" name="gambarLama" value="<?= $data->foto_fasilitas ?>">
                     <input type="hidden" name="idfasilitas" value="<?= $dataid ?>">
                     <div class="form-group row">
                        <label for="namaFasilitas" class="col-sm-2 col-form-label">Nama Fasilitas</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="namafasilitas" id="namaFasilitas"
                              value="<?= $data->fasilitas ?>">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="ketFasilitas" class="col-sm-2 col-form-label">Ket. Fasilitas</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" name="ketFasilitas" id="ketFasilitas"
                              rows="3"><?= $data->keterangan ?></textarea>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="fotoFasilitas" class="col-sm-2 col-form-label">Foto Fasilitas</label>
                        <div class="col-sm-10">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="fotoFasilitas" id="fotoFasilitas">
                              <label class="custom-file-label" for="fotoFasilitas"><?= $data->foto_fasilitas ?></label>
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