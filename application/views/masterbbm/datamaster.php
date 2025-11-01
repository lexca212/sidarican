 <div class="card">
     <div class="card-header">
         <!-- <h3 class="card-title">DataTable with default features</h3> -->

         <!-- <button type="button" class="btn btn-primary btn-sm">Tambah</button> -->
         <a href="<?= site_url('admin/masterbbm/tambah') ?>" class="btn btn-primary btn-sm">Tambah Data</a>

     </div>
     <!-- /.card-header -->
     <div class="card-body">
         <table id="example1" class="table table-bordered table-striped">
             <thead>
                 <tr>
                     <th>Kode BBM</th>
                     <th>Nama BBM</th>
                     <th>Harga BBM</th>
                 </tr>
             </thead>

             <tbody>
                 <?php foreach ($bbm as $b) { ?>
                     <tr>
                         <td><?= $b->kd_bbm ?></td>
                         <td><?= $b->nama_bbm ?></td>
                         <td><?= $b->harga_bbm ?></td>
                     </tr>
                 <?php } ?>
             </tbody>

         </table>
     </div>
     <!-- /.card-body -->
 </div>
 <!-- /.card -->