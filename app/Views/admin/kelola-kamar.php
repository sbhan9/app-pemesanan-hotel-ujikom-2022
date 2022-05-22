<?= $this->extend('layouts_dashboard/templates') ?>
<?= $this->section('dashboard-content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Kamar</h1>
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
                  <h5 class="card-title">Daftar Kamar</h5>
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
                           <th scope="col">Tipe Kamar</th>
                           <th scope="col">Fasilitas Kamar</th>
                           <th scope="col">Jumlah Kamar</th>
                           <th scope="col">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($kamar as $k) : ?>
                        <tr>
                           <th class="text-center" scope="row"><?= $no++ ?>.</th>
                           <td><?= $k['tipe_kamar'] ?></td>
                           <td><?= $k['fasilitas'] ?></td>
                           <td class="text-center"><?= $k['stok_kamar'] ?></td>
                           <td>
                              <div class="d-flex justify-content-center">
                                 <a href="<?= base_url('/administrator/edit-data-kamar/'.$k['id_kamar']) ?>"
                                    class="btn btn-info mr-2"><i class="fas fa-edit"></i></a>
                                 <a href="<?= base_url('/administrator/delete-data-kamar/'.$k['id_kamar']) ?>"
                                    class="btn btn-danger mr-2" id="tombolHapusKamar"><i
                                       class="fas fa-trash-alt"></i></a>
                              </div>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
                  <a href="#" class="btn btn-primary float-right mt-2" data-toggle="modal"
                     data-target="#exampleModal"><i class="fas fa-person-booth"></i> Tambah Data
                     Kamar</a>
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
            <form action="<?= base_url('/administrator/tambah-data-kamar') ?>" method="post"
               enctype="multipart/form-data">
               <?= csrf_field() ?>
               <div class="form-group row">
                  <label for="tipekamar" class="col-sm-2 col-form-label">Tipe Kamar</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="tipekamar" id="tipekamar">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="nket" class="col-sm-2 col-form-label">Keterangan Fasilitas</label>
                  <div class="col-sm-10">
                     <textarea class="form-control" id="nket" name="nket" rows="3"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="jmlhkamar" class="col-sm-2 col-form-label">Jumlah Kamar</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="jmlhkamar" id="jmlhkamar">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="hargakamar" class="col-sm-2 col-form-label">Harga Permalam</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="hargakamar" id="hargakamar">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="nfot" class="col-sm-2 col-form-label">Foto Kamar</label>
                  <div class="col-sm-10">
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="nfot" name="nfoto">
                        <label class="custom-file-label" for="nfot">Choose file</label>
                     </div>
                  </div>
               </div>
               <?php $k = rand(12345678, 87654321) ?>
               <div class="form-group row">
                  <label for="kodekamar" class="col-sm-2 col-form-label">Kode Kamar</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" name="kodekamar" id="kodekamar" value="<?= $k ?>" readonly>
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