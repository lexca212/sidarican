 <div class="card">
     <div class="card-header">
         <!-- <h3 class="card-title">DataTable with default features</h3> -->

         <!-- <button type="button" class="btn btn-primary btn-sm">Tambah</button> -->
         <a href="<?= site_url('pembelianbbm/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>

     </div>
     <!-- /.card-header -->
     <div class="card-body">
         <table id="example1" class="table table-bordered table-striped">
             <thead>
                 <tr>
                     <th>Tanggal Pembelian</th>
                     <th>Kendaraan</th>
                     <th>Jenis BBM</th>
                     <th>Harga/liter</th>
                     <th>Jumlah(liter)</th>
                     <th>Total Harga Beli</th>
                 </tr>
             </thead>

             <tbody>
                <?php foreach ($pembelianbbm as $p){?>
                <tr>
                    <td><?= $p->tanggal_beli; ?></td>
                    <td><?= $p->nm_kendaraan ?>, <?= $p->merk_kendaraan ?> (<?= $p->nopol_kendaraan ?>)</td>
                    <td><?= $p->nama_bbm; ?></td>
                    <td><?= $p->harga_bbm; ?></td>
                    <td><?= $p->jml_liter_bbm ?></td>
                    <td> <?= $p->jml_harga_bbm ?></td>
                </tr>
                <?php }?>
             </tbody>

         </table>
     </div>
     <!-- /.card-body -->
 </div>
 <!-- /.card -->