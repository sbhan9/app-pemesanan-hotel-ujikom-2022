<table class="table table-bordered" id="tabelFilterDate">
   <thead>
      <tr class="text-center">
         <th scope="col">No.</th>
         <th scope="col">Nama Lengkap</th>
         <th scope="col">Username</th>
         <th scope="col">No. Telephone</th>
         <th scope="col">Check In</th>
         <th scope="col">Check Out</th>
         <th scope="col">Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php $no = 1; ?>
      <?php if($dataOrder) : ?>
      <?php foreach($dataOrder as $o) : ?>
      <tr>
         <th scope="row" class="text-center"><?= $no++ ?>.</th>
         <td><?= $o['nama'] ?></td>
         <td><?= $o['username'] ?></td>
         <td><?= $o['no_telephone'] ?></td>
         <td><?= $o['check_in'] ?></td>
         <td><?= $o['check_out'] ?></td>
         <td class="text-center">
            <a href="<?= base_url('/page-resepsionis/detail/'.$o['username']) ?>" class="btn btn-info tombol-detail"><i
                  class="fas fa-info-circle"></i></a>
         </td>
      </tr>
      <?php endforeach ?>
      <?php else : ?>
      <td colspan="7" class="text-center">pencarian data tidak ditemukan</td>
      <?php endif ?>
   </tbody>
</table>