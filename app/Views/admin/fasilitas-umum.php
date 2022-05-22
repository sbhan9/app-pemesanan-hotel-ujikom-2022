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
                  <h5 class="card-title">Daftar Fasilitas Umum</h5>
                  <div class="gagal" data-flashdata="<?= session()->getFlashdata('error') ?>"></div>
                  <div class="berhasil" data-flashdata="<?= session()->getFlashdata('tambahBerhasil') ?>"></div>
                  <div class="editBerhasil" data-flashdata="<?= session()->getFlashdata('updateberhasil') ?>"></div>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <table class="table table-bordered">
                     <thead>
                        <tr class="text-center">
                           <th scope="col">No.</th>
                           <th scope="col">Fasilitas</th>
                           <th scope="col">Keterangan</th>
                           <th scope="col">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($fasilitasUmum as $f) : ?>
                        <tr>
                           <th class="text-center" scope="row"><?= $no++ ?>.</th>
                           <td><?= $f['fasilitas'] ?></td>
                           <td><?= $f['keterangan'] ?></td>
                           <td>
                              <div class="d-flex justify-content-center">
                                 <a href="<?= base_url('/administrator/edit-fasilitas-umum/'.$f['id_fasilitas']) ?>"
                                    class="btn btn-info mr-2"><i class="fas fa-edit"></i></a>
                                 <a href="<?= base_url('/administrator/hapusFasilitasUmum/'.$f['id_fasilitas']) ?>"
                                    class="btn btn-danger mr-2" id="tombolHapus"><i class="fas fa-trash-alt"></i></a>
                              </div>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
                  <a href="#" class="btn btn-primary float-right mt-2" data-toggle="modal"
                     data-target="#exampleModal"><i class="fas fa-person-booth"></i> Tambah
                     Fasilitas</a>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Fasilitas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="<?= base_url('/administrator/tambah-fasilitas') ?>" method="post"
               enctype="multipart/form-data">
               <?= csrf_field() ?>
               <div class="form-group row">
                  <label for="nfasilitas" class="col-sm-2 col-form-label">Nama Fasilitas</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="nfasilitas" id="nfasilitas">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="nket" class="col-sm-2 col-form-label">Keterangan Fasilitas</label>
                  <div class="col-sm-10">
                     <textarea class="form-control" id="nket" name="nket" rows="3"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="nfot" class="col-sm-2 col-form-label">Foto Fasilitas</label>
                  <div class="col-sm-10">
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="nfot" name="nfoto">
                        <label class="custom-file-label" for="nfot">Choose file</label>
                     </div>
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-sm-12">
                     <button type="submit" class="btn btn-primary float-right">Tambahkan</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<?= $this->endSection() ?>