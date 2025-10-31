 <div class="card">
     <div class="card-header">
         <!-- <h3 class="card-title">DataTable with default features</h3> -->

         <!-- <button type="button" class="btn btn-primary btn-sm">Tambah</button> -->
         <a href="<?= site_url('dashboard/tambah') ?>" class="btn btn-primary btn-sm">Tambah Data</a>

     </div>
     <!-- /.card-header -->
     <div class="card-body">
         <table id="example1" class="table table-bordered table-striped">
             <thead>
                 <tr>
                     <th>Nama Kendaraan</th>
                     <th>Merk Kendaraan</th>
                     <th>Nopol</th>
                     <th>BBM</th>
                     <th>Tahun</th>
                 </tr>
             </thead>

             <tbody>
                 <?php foreach ($data as $d) { ?>
                     <tr>
                         <td><?= $d->nm_kendaraan; ?></td>
                         <td><?= $d->merk_kendaraan ?>
                         </td>
                         <td><?= $d->nopol_kendaraan ?></td>
                         <td> <?= $d->bbm_kendaraan ?></td>
                         <td><?= $d->tahun_kendaraan ?></td>
                     </tr>
                 <?php } ?>
             </tbody>

         </table>
     </div>
     <!-- /.card-body -->
 </div>
 <!-- /.card -->